<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SalesController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\ColloctionController;
use Illuminate\Support\Facades\Route;

// frontend route
// Route::get('/', function () {
//     return view('frontend/home/home');
// });


// backend route

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('backend/dashboard/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('product/index',[ProductController::class,'index'])->name('product.index');
    Route::get('product/insert',[ProductController::class,'create'])->name('product.create');
    Route::post('product/insert',[ProductController::class,'store'])->name('product.store');
    Route::get('product/update/{product_id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('product/update/{product_id}',[ProductController::class,'update'])->name('product.update');
    Route::get('product/show/{product_id}',[ProductController::class,'show'])->name('product.show');
    Route::get('product/destroy/{product_id}',[ProductController::class,'destroy'])->name('product.destroy');
});

require __DIR__.'/auth.php';




