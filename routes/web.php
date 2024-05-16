<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/', function () {
    return redirect('/index');
});
// Default pages
{
    Route::view('/about', 'default.about')->name('about'); 
    Route::view('/contact', 'default.contact')->name('contact'); 
    Route::view('/faqs', 'default.faqs')->name('faqs'); 
    Route::view('/index', 'default.home')->name('homes'); 
}

Route::get('/dashboard', function () {
    return view('default.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('profile/updatePhoneAndAddress', [ProfileController::class, 'updatePhoneAndAddress'])->name('profile.updatePhoneAndAddress');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Product Related Route
{
    Route::get('/product', [ProductController::class, 'index'])->name('products.index'); //goto index
    Route::view('/product/add', 'products.addProduct')->name('products.add'); // goto create product page
    Route::get('/product/details/{id}', [ProductController::class, 'show'])->name('products.details'); //get specific product

    Route::post('/product/store', [ProductController::class, 'store'])->name('products.store'); // store product

    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('products.delete'); // Delete from index
    Route::delete('/product/details/{id}/delete', [ProductController::class, 'deleteFromDetails'])->name('products.delete.details'); // Delete from details
    Route::get('/product/details/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); //nav to edit prod page
    Route::post('/product/details/{id}', [ProductController::class, 'update'])->name('products.update'); // save product //nav to edit prod page
}

//Cart Related Route
{
    Route::post('product/cart/add', [CartController::class, 'addItem'])->name('cart.addItem');
    Route::delete('product/cart/remove/{cart_id}', [CartController::class, 'removeItem'])->name('cart.removeItem');
    Route::post('/product/cart/add/{cart_id}', [CartController::class, 'incrementItem'])->name('cart.add');
    Route::post('/product/cart/minus/{cart_id}', [CartController::class, 'decrementItem'])->name('cart.minus');
    Route::get('/product/cart/total', [CartController::class, 'totalPrice'])->name('cart.total');
}

//Order Related Route
{
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::post('order/create', [OrderController::class, 'create'])->name('order.create');
    Route::get('/order/details/{order_id}', [OrderController::class, 'order_details'])->name('order.details');
    Route::post('order/cancel/{order_id}', [OrderController::class, 'order_cancel'])->name('order.cancel');
    Route::get('order/payment/{order_id}/invoice', [OrderController::class, 'create_invoice'])->name('order.invoice');
}

//Payment Related Route
{
    Route::get('order/payment/{order_id}', [PaymentController::class, 'attempt'])->name('payment.attempt');
    Route::post('payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::delete('product/payment/remove/{payment_id}', [PaymentController::class, 'delete'])->name('payment.delete');

    //admin
    Route::post('/order/payment/{id}/update_status', [PaymentController::class, 'update_status'])->name('payment.update_status');
}

//Shipping Related Route
{
    Route::post('/order/{id}/update_shipment', [ShippingController::class, 'update_tracking'])->name('shipping.update_tracking');
}

//Review Related Route
{
    Route::get('/order-items/{order_item_id}/review', [ReviewController::class, 'index'])->name('review.index');
    Route::post('/order-items/review/store/{id}', [ReviewController::class, 'store'])->name('review.store');
}


require __DIR__ . '/auth.php';
