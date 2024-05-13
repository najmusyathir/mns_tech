<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderItem;

class PaymentController extends Controller
{
    public function attempt($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order_items = OrderItem::where('order_id', $order_id)->get();
        $payment = Payment::where('order_id', $order_id)->get();


        return view('payment.payment_page', [
            'order' => $order,
            'order_items' => $order_items,
            'payments' => $payment,
        ]);
    }

    public function create(Request $request)
    {

        $payment = new Payment();
        $payment->order_id = $request->input('order_id');
        $payment->payment_evidence = 'null';
        $payment->status = 'Pending Review';
        $payment->save();
        $payment_id = $payment->id;

        if ($request->hasFile('payment_evidence')) {
            $imageExtension = $request->file('payment_evidence')->extension();

            $imageName = 'payments/payment_' . $payment_id . '.' . $imageExtension;
            $request->file('payment_evidence')->move(public_path('payments'), $imageName);
            $payment->payment_evidence = $imageName;
            $payment->save();
            

            $this->updateOrderStatus($request->input('order_id'));

            return redirect()->back();
        } else {
            $deletepayment = Payment::findOrFail($payment_id);
            $deletepayment->delete();
        }
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $imagePath = public_path($payment->payment_evidence);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $payment->delete();

        $this->updateOrderStatus($request->input('order_id'));

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function update_status(Request $request, $payment_id)
    {

        $payment = Payment::findOrFail($payment_id);
        $payment->status = $request->input('new_status');
        $payment->save();

        $order = Order::findOrFail($payment->order_id);
        $order->status = $request->input('new_status');
        $order->save();

        return redirect()->back()->with('success', 'Payment' . $payment->status);
    }

    public function updateOrderStatus($order_id)
{
    $paymentCount = Payment::where('order_id', $order_id)->count();

    $order = Order::findOrFail($order_id);
    $order->status = $paymentCount > 0 ? 'Pending Review' : 'Payment Pending';
    $order->save();
}

}
