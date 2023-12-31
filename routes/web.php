<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\StockController;
use App\Http\Controllers\backend\SalesController;
use App\Http\Controllers\backend\CollectionController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\UserController;
use Illuminate\Support\Facades\Route;


// backend route

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user',[UserController::class,'index'])->name('user');
});

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
    Route::get('stock/index',[StockController::class,'index'])->name('stock.index');
    Route::get('stock/insert',[StockController::class,'create'])->name('stock.create');
    Route::post('stock/insert',[StockController::class,'store'])->name('stock.store');
    Route::get('stock/update/{stock_id}',[StockController::class,'edit'])->name('stock.edit');
    Route::post('stock/update/{stock_id}',[StockController::class,'update'])->name('stock.update');
    Route::get('stock/show/{stock_id}',[StockController::class,'show'])->name('stock.show');
    Route::get('stock/invice/{stock_id}',[StockController::class,'invice'])->name('stock.invice');
    Route::get('stock/destroy/{stock_id}',[StockController::class,'destroy'])->name('stock.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('sales/index',[salesController::class,'index'])->name('sales.index');
    Route::get('sales/insert',[salesController::class,'create'])->name('sales.create');
    Route::post('sales/insert',[salesController::class,'store'])->name('sales.store');
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
    Route::get('all/balance/invice/',[ReportController::class,'all_balance_invice'])->name('all_balance.invice');
    Route::get('single/balance/invice/',[ReportController::class,'single_balance_invice'])->name('single_balance.invice');

    Route::get('report/stock',[ReportController::class,'stock'])->name('report.stock');
    Route::get('report/sales',[ReportController::class,'sales'])->name('report.sales');
    Route::get('report/collection',[ReportController::class,'collection'])->name('report.collection');
});


require __DIR__.'/auth.php';

// Route::put('update', [])
// Route::delet('update', [])

//get 
// create/inser - proset 
//put - update
//delete - delete 

// post
// @csrf
// @method('DELET')




