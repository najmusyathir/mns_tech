<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        $userType = auth()->user()->user_type;
    
        if ($userType === 'user') {
            $userId = auth()->id();
            $orders = Order::where("user_id", $userId)->get();
        } else if ($userType === 'admin') {
            $orders = Order::get();
        } else {
            abort(404);
        }
    
        return view("order.index", compact("orders"));
    }

    public function adminIndex($status = null)
{
    $query = Order::query();

    if ($status) {
        $query->where('status', $status);
    }

    $orders = $query->get();

    return response()->json($orders);
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
        }
    
        // Get all information for user and order_items
        $user = User::find($userId);
    
        // Delete all cart items for the user
        Cart::where("user_id", $userId)->delete();
    
        // Fetch order_items for the current order
        $orderItems = OrderItem::where('order_id', $orderId)->get();
    
        // Redirect to the invoice with the order
        return view('order.invoice', [
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

    public function update_payment(Request $request, $order_id)
    {
                  
        if ($request->hasFile('payment_evidence')) {            
            $imageExtension = $request->file('payment_evidence')->extension();
    
            $imageName = 'payment_' . $order_id . '.' . $imageExtension;
            $request->file('payment_evidence')->move(public_path('payments'), $imageName);
    
            //toubleshoot
            $orderitems = OrderItem::where('order_id', $order_id)->get();
            $user_id = auth()->id();
            $user = User::findOrFail($user_id);
     
            $order = Order::where("order_id", $order_id)->firstOrFail();
            $order->payment_evidence = 'payments/' . $imageName;
            $order->save();
    
            return view('order.orderDetails2', [
                'order' => $order,
                'orderItems' => $orderitems,
                'user' => $user               
            ]);
        } 
    }
    
}
