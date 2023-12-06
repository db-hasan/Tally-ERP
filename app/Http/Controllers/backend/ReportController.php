<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Sales;
use App\Models\S_order;
use Session;

class ReportController extends Controller
{
    public function balance() {
        $indexCustomar = Sales::join('customars', 'sales.sales_id', '=', 'customars.customar_id')->get();
        return view('backend/balancereport/index', compact('indexCustomar'));
    }

    public function single_balance_invice($sbi_id) {
        $showData = Sales::join('customars', 'sales.sales_id', '=', 'customars.customar_id')
                            ->where('sales.sales_id', $sbi_id)
                            ->first();

        $showDatas =S_order::join('products', 's_orders.product_id', '=', 'products.product_id')
                            ->where('s_orders.sales_id', $sbi_id)
                            ->get();
        return view('backend/balancereport/single_invoice', compact('showData'), compact('showDatas'));
    }

    public function all_balance_invice() {
        $showData =Sales::join('customars', 'sales.customar_id', '=', 'customars.customar_id')
                        ->join('s_orders', 'sales.sales_id', '=', 's_orders.sales_id')
                        ->join('products', 's_orders.product_id', '=', 'products.product_id')
                        ->join('collections', 'sales.customar_id', '=', 'collections.customar_id')
                        ->get();

        // $sOrder =S_order::join('customars', 's_orders.customar_id', '=', 'customars.customar_id')
        //                 ->join('products', 's_orders.product_id', '=', 'products.product_id')
        //                 ->get();
    
        return view('backend/balancereport/all_invoice', compact('showData'));
    }



    public function sales() {
        return view('backend/salesreport/index');
    }


    public function stock() {
        return view('backend/stockreport/index');
    }


    public function collection() {
        return view('backend/collectionreport/index');
    }
}


