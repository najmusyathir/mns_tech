<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;


class CartController extends Controller
{
    public function index(Request $request)
    {
        $userID = $request->user_id;
        $cart = Cart::where("user_id", $userID)->get();
     
        return redirect()->back()->with('success', 'Product Added to cart!');
    }

    public function addItem(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Get the authenticated user's ID
        $userId = auth()->id();
    
        // Create a new Cart instance
        $cart = new Cart();
        $cart->product_id = $validatedData['product_id'];
        $cart->user_id = $userId;
        $cart->quantity = $validatedData['quantity'];
        $cart->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function removeItem(Request $request, $cart_id)
    {
        $cart = Cart::findOrFail($cart_id);   
        $cart->delete();
        
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }


    
}
