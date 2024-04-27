<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::get('/dashboard', function () {
    return view('dashboard');
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

//User Related Route
require __DIR__ . '/auth.php';
