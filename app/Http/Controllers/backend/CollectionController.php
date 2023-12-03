<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    //
}

Route::middleware('auth')->group(function () {
    Route::get('product/index',[ProductController::class,'index'])->name('product.index');
    Route::get('product/insert',[ProductController::class,'create'])->name('product.create');
    Route::post('product/insert',[ProductController::class,'store'])->name('product.store');
    Route::get('product/update/{product_id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('product/update/{product_id}',[ProductController::class,'update'])->name('product.update');
    Route::get('product/show/{product_id}',[ProductController::class,'show'])->name('product.show');
    Route::get('product/destroy/{product_id}',[ProductController::class,'destroy'])->name('product.destroy');
});
