<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Review;
use App\Models\User;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filterType = $request->input('type');
    
        if ($filterType) {
            $products = Product::where('prod_type', $filterType)->get();
        } else {
            $products = Product::all();
        }
    
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $carts = Cart::where('user_id', $userId)->get();
        } else {
            $carts = [];
        }
    
        return view('products.index', compact('products', 'carts', 'filterType'));
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

        // Retrieve the auto-incremented ID of the newly saved product
        $productId = $product->id;

        // Handle image upload if a file was uploaded
        if ($request->hasFile('prod_pic')) {
            $imageExtension = $request->file('prod_pic')->extension();
            $imageName = $productId . '.' . $imageExtension;
            $request->file('prod_pic')->move(public_path('products'), $imageName);

            // Update the product record with the correct image path
            $product->prod_pic = 'products/' . $imageName;
            $product->save();
        }

        $products = Product::all();

        
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $carts = Cart::where('user_id', $userId)->get();
        } else {
            $carts = [];
        }

        return view('products.index', compact('products', 'carts'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path($product->prod_pic);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();


        return view('products.index');
    }

    public function deleteFromDetails($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path($product->prod_pic);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();

        return view('products.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::with('user')->where('prod_id', $id)->get();
       
        return view('products.prodDetails', ['product' => $product, 'reviews'=>$reviews]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.prodEdit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->prod_title = $request->input('prod_title');
        $product->prod_desc = $request->input('prod_desc');
        $product->prod_brand = $request->input('prod_brand');
        $product->prod_type = $request->input('prod_type');
        $product->prod_price = $request->input('prod_price');
        $product->prod_stock = $request->input('prod_stock');

        // Handle image upload if a file was uploaded
        if ($request->hasFile('prod_pic')) {
            $imageExtension = $request->file('prod_pic')->extension();
            $imageName = $id . '.' . $imageExtension;
            $request->file('prod_pic')->move(public_path('products/images'), $imageName);
            $product->prod_pic = 'products/images/' . $imageName;
        }
        $product->save();

        // Redirect to the prodDetails view
        return redirect()->route('products.details', ['id' => $id])->with('success', 'Product updated successfully!');
    }
}
