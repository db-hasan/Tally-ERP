<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customar;
use App\Models\Collection;
use App\Models\S_order;
use Session;

class DashboardController extends Controller
{
    public function index() {
        $indexData['indexCustomar']= Customar::groupBy('customar_id')->get(); 
        $indexData['indexWordlist']= count($indexData['indexCustomar']);   
        $indexData['indexCollection']= Collection::all(); 
        $indexData['indexsOrder']= S_order::join('products', 'S_orders.product_id', '=', 'products.product_id')->get();
        return view('backend/dashboard/dashboard', $indexData);
    }
}
