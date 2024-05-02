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

        // Check if the item already exists in the cart
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $validatedData['product_id'])
            ->first();

        if ($cart) {
            // If the item exists, update the quantity
            $cart->quantity += $validatedData['quantity'];
            $cart->save();
        } else {
            // If the item does not exist, create a new cart entry
            $cart = new Cart();
            $cart->product_id = $validatedData['product_id'];
            $cart->user_id = $userId;
            $cart->quantity = $validatedData['quantity'];
            $cart->save();
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added to cart!');
    }


    public function removeItem(Request $request, $cart_id)
    {
        $cart = Cart::findOrFail($cart_id);
        $cart->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function incrementItem(Request $request)
    {
        $cart_id = $request->cart_id;
        $cart = Cart::find($cart_id);

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
            return redirect()->back()->with('success', 'Quantity increased!');
        }
    }


    public function decrementItem(Request $request)
    {
        $cart_id = $request->cart_id;
        $cart = Cart::find($cart_id);

        if ($cart->quantity > 1) {
            if ($cart) {
                $cart->quantity -= 1;
                $cart->save();
                return redirect()->back()->with('success', 'Quantity increased!');
            }
        }
    }
}
