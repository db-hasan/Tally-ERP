<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SalesController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\CollectionController;
use App\Http\Controllers\backend\ReportController;
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

Route::middleware('auth')->group(function () {
    Route::get('sales/index',[salesController::class,'index'])->name('sales.index');
    Route::get('sales/insert',[salesController::class,'create'])->name('sales.create');
    Route::post('sales/insert',[salesController::class,'store'])->name('sales.store');
    Route::get('sales/show/{sales_id}',[salesController::class,'show'])->name('sales.show');
    Route::get('sales/invice/{sales_id}',[salesController::class,'invice'])->name('sales.invice');
    Route::get('sales/destroy/{sales_id}',[salesController::class,'destroy'])->name('sales.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('collection/index',[CollectionController::class,'index'])->name('collection.index');
    Route::get('collection/insert',[CollectionController::class,'create'])->name('collection.create');
    Route::post('collection/insert',[CollectionController::class,'store'])->name('collection.store');
    Route::get('collection/update/{collection_id}',[CollectionController::class,'edit'])->name('collection.edit');
    Route::post('collection/update/{collection_id}',[CollectionController::class,'update'])->name('collection.update');
    Route::get('collection/show/{collection_id}',[CollectionController::class,'show'])->name('collection.show');
    Route::get('collection/invice/{collection_id}',[CollectionController::class,'invice'])->name('collection.invice');
    Route::get('collection/destroy/{collection_id}',[CollectionController::class,'destroy'])->name('collection.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('report/balance',[ReportController::class,'balance'])->name('report.balance');
    Route::get('report/stock',[ReportController::class,'stock'])->name('report.stock');
    Route::get('report/sales',[ReportController::class,'sales'])->name('report.sales');
    Route::get('report/collection',[ReportController::class,'collection'])->name('report.collection');
});


require __DIR__.'/auth.php';




