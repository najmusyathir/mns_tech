<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Http\Controllers\ShippingController;

class OrderController extends Controller
{
    public function index()
    {
        $userType = auth()->user()->user_type;

        if ($userType === 'user') {
            $userId = auth()->id();
            $orders = Order::where("user_id", $userId)->orderBy('created_at', 'desc')->get();

            $orderIds = $orders->pluck('id');
            $shippings = Shipping::whereIn("order_id", $orderIds)->get();
        } else if ($userType === 'admin') {
            $orders = Order::orderBy('created_at', 'desc')->get();
            $shippings = Shipping::get();
        } else {
            abort(404);
        }
        return view("order.index", compact("orders", "shippings"));
    }

    public function create(Request $request)
    {
        $userId = auth()->id();

        $order = new Order();
        $order->user_id = $userId;
        $order->total_price = $request->input('total_price');
        $order->status = $request->input('status');

        $order->save();

        // Get the order ID
        $orderId = $order->id;

        // Get all cart items for the user
        $cartItems = Cart::where("user_id", $userId)->get();

        // Loop through cart items and create order_items
        foreach ($cartItems as $cartItem) {
            $prod = Product::where("id", $cartItem->product_id)->first();

            $orderItem = new OrderItem();
            $orderItem->order_id = $orderId;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->prod_title = $prod->prod_title;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price_per_item = $prod->prod_price;
            $orderId = $order->id;
            $orderItem->save();

            $prod->prod_stock -= $cartItem->quantity;
            $prod->save();
        }

        // Get all information for user and order_items
        $user = User::find($userId);

        // Delete all cart items for the user
        Cart::where("user_id", $userId)->delete();

        // Fetch order_items for the current order
        $orderItems = OrderItem::where('order_id', $orderId)->get();

        // Create shipping record
        $shippingController = new ShippingController();
        $shippingController->create($orderId);

        // Show page order created
        return view('order.post_create', [
            'order' => $order,
            'user' => $user,
            'orderItems' => json_encode($orderItems),
        ]);
    }

    public function order_details($order_id)
    {
        $user_id = auth()->id();
        $user = User::findOrFail($user_id);
        $order = Order::findOrFail($order_id);
        $orderitems = OrderItem::where('order_id', $order_id)->get();

        return view('order.orderDetails', [
            'order' => $order,
            'orderItems' => $orderitems,
            'user' => $user
        ]);
    }

    public function order_cancel($order_id)
    {
        $order = Order::findOrFail($order_id);

        if ($order->status !== 'Order Cancelled') {
            $orderItems = OrderItem::where('order_id', $order->id)->get();

            foreach ($orderItems as $orderItem) {
                $product = Product::find($orderItem->product_id);
                if ($product) {
                    $product->prod_stock += $orderItem->quantity;
                    $product->save();
                }
            }

            $order->status = 'Order Cancelled';
            $order->save();
        }

        return redirect()->back();
    }


    public function create_invoice($order_id)
    {
        $user_id = auth()->id();
        $user = User::findOrFail($user_id);
        $order = Order::findOrFail($order_id);
        $orderitems = OrderItem::where('order_id', $order_id)->get();

        return view('order.invoice', [
            'order' => $order,
            'order_items' => $orderitems,
            'user' => $user
        ]);
    }

    public function print_invoice($order_id)
    {
        $user_id = auth()->id();
        $user = User::findOrFail($user_id);
        $order = Order::with('orderItems')->findOrFail($order_id); 
    
        $pdf = Pdf::loadView('order.pdf_content', [
            'order' => $order,
            'order_items' => $order->orderItems,
            'user' => $user
        ]);
    
        return $pdf->download('invoice_' . $order_id . '.pdf');
    }
    
}
