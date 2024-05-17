<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderItem;


class ReviewController extends Controller
{
    public function index($id)
    {
        $order_item = OrderItem::findOrFail($id);

        $product = Product::findOrFail($order_item->product_id);

        $existingReview = Review::where('order_id', $order_item->order_id)
            ->where('prod_id', $order_item->product_id)
            ->first();

        if ($existingReview) {
            $existingReview->delete();
        }
        return view('review.index', ['order_item' => $order_item, 'product' => $product]);
    }


    public function store(Request $request, $id)
    {
        $user_id = auth()->id();
        $order_item = OrderItem::findOrFail($id);

        $product = Product::findOrFail($request->input('prod_id'));

        $existingReview = Review::where('order_id', $order_item->order_id)
            ->where('prod_id', $order_item->product_id)
            ->first();

        if ($existingReview) {
            $existingReview->delete();
        }

        $review = new Review();
        $review->order_id = $order_item->order_id;
        $review->user_id = $user_id;
        $review->prod_id = $order_item->product_id;
        $review->rating = $request->input('rating');
        $review->description = $request->input('description');
        $review->save();

        return view('review.post_create', ['review' => $review, 'product' => $product]);
    }












    public function show($id)
    {
    }

    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
    public function destroyReview($id)
    {
    }
    public function reviews()
    {
    }
    public function reviewsDetail($id)
    {
    }
}
