<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;

class ShippingController extends Controller
{
    public function index()
    {
        $shipping = Shipping::all();
        return $shipping;
    }

    public function create($order_id)
    {
        $shipping = new Shipping();

        $shipping->order_id = $order_id;
        $shipping->status = "Order Processing";
        $shipping->tracking_no = "";
        $shipping->save();
    }

    public function update_tracking(Request $request,$id){

        $shipping = Shipping::where('order_id', $id)->firstOrFail();
        $shipping->status = $request->input('status');
        $shipping->tracking_no = $request->input('tracking_no');
        $shipping->save();

        return redirect()->back()->with('success','tracking_no updated');
    }
}
