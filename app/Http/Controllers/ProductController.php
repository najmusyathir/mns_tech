<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() //controller to products list page
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function indexNav(){
        return view('products.index');
    }
    
    public function store(Request $request)
    {
        $product = new Product();
        $product->prod_title = $request->input('prod_title');
        $product->prod_desc = $request->input('prod_desc');
        $product->prod_brand = $request->input('prod_brand');
        $product->prod_type = $request->input('prod_type');
        $product->prod_pic = 'default_link';
        $product->prod_price = $request->input('prod_price');
        $product->prod_stock = $request->input('prod_stock');
        $product->save();
    
        // Save the product without setting the prod_pic yet
        $product->save();
    
        // Retrieve the auto-incremented ID of the newly saved product
        $productId = $product->id;
    
        // Handle image upload if a file was uploaded
        if ($request->hasFile('prod_pic')) {
            $imageExtension = $request->file('prod_pic')->extension();
            $imageName = $productId . '.' . $imageExtension;
            $request->file('prod_pic')->move(public_path('products/images'), $imageName);
    
            // Update the product record with the correct image path
            $product->prod_pic = 'products/images/' . $imageName;
            $product->save();
        }
    
        // Redirect back or to a different page after adding the product
        return redirect()->back()->with('success', 'Product added successfully!');
    }
    
    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
