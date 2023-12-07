<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Sales;
use App\Models\S_order;
use App\Models\Customar;
use Session;

class ReportController extends Controller
{
    public function balance() {
        $indexCustomar = Sales::join('customars', 'sales.sales_id', '=', 'customars.customar_id')->get();
        return view('backend/balancereport/index', compact('indexCustomar'));
    }
    public function single_balance_invice(Request $request) {
            $customers = Customar::where('customar_id', $request->customer)->get();

            $customers->each(function ($customer){
                $customerProducts = S_order::join('products', 's_orders.product_id', '=', 'products.product_id')
                                    ->where('customar_id', $customer->customar_id)->get();
                $totalSellingPrice = 0;
                $customerProducts->each(function($customerProducut) use (&$totalSellingPrice){
                    $totalSellingPrice += $customerProducut->selling_price * $customerProducut->order_quantity;
                });
                $customer->totalSales = $totalSellingPrice;

                // Calulating Total Collection
                $collections = Collection::where('customar_id', $customer->customar_id)->sum('payment');
                $customer->totalCollection = $collections;
            });
            $customerInfo = $customers[0];
        return view('backend/balancereport/single_invoice', compact('customerInfo'));
    }

    public function all_balance_invice() {
        $customers = Customar::all();
        $customers->each(function($customer){
            $customerProducts = S_order::join('products', 's_orders.product_id', '=', 'products.product_id')
                                ->where('customar_id', $customer->customar_id)->get();
            $totalSellingPrice = 0;
            $customerProducts->each(function($customerProducut) use (&$totalSellingPrice){
               $totalSellingPrice += $customerProducut->selling_price * $customerProducut->order_quantity;
            });
            $customer->totalSales = $totalSellingPrice;

            // Calulating Total Collection
            $collections = Collection::where('customar_id', $customer->customar_id)->sum('payment');
            $customer->totalCollection = $collections;

        });
        return view('backend/balancereport/all_invoice', compact('customers'));
    }



    public function sales() {
        return view('backend/salesreport/index');
    }
    // public function single_balance_invice(Request $request) {
    //    $sbi_id= $request->customer;

    //     $showData = Sales::join('customars', 'sales.sales_id', '=', 'customars.customar_id')
    //                         ->where('sales.sales_id', $sbi_id)
    //                         ->first();

    //     $showDatas =S_order::join('products', 's_orders.product_id', '=', 'products.product_id')
    //                         ->join('collections', 's_orders.customar_id', '=', 'collections.customar_id')
    //                         ->where('s_orders.sales_id', $sbi_id)
    //                         ->get();
    //     return view('backend/balancereport/single_invoice', compact('showData'), compact('showDatas'));
    // }

    public function stock() {
        return view('backend/stockreport/index');
    }


    public function collection() {
        return view('backend/collectionreport/index');
    }
}


