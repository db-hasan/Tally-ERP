<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Product;
use App\Models\Status;
use Session;
use DB;

class SalesController extends Controller
{
    public function index() {
        $indexSales = Sales::all();
        return view('backend/sales/index', compact('indexSales'));
    }
    

    public function create(){
        $indexData['indexProduct']= Product::all();
        return view('backend/sales/create', $indexData);
    }
    public function store(Request $request){    
        $rules = [
            'suppliers_name' => 'required|max:50',
        ];
        
        $v_msg = [
            'suppliers_name.required'=> 'Please enter the supplier name.',
            // Add more messages for other validation rules if needed.
        ];
        
        $this->validate($request, $rules, $v_msg);

        try { 
            DB::beginTransaction();

            $purchase = new sales();
            $purchase->suppliers_id = $request->suppliers_name;
            $purchase->save();

            $types = $request->buying_price;

            foreach ($types as $index => $type) {
                $pOrder = new P_order();
                $pOrder->sales_id = $purchase->sales_id;
                $pOrder->suppliers_id = $purchase->suppliers_id;
                $pOrder->p_buying_price = $request->buying_price[$index];
                $pOrder->product_id = $request->product_name[$index];
                $pOrder->p_selling_price = $request->selling_price[$index];
                $pOrder->p_product_quantity = $request->product_quantity[$index];
                $pOrder->save();
            }

            DB::commit();
            
            // Flash message and redirect moved outside the try block
            return redirect()->route('sales.index')->with('msg','Data submitted successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error','Ops! Data insert fail');
        }
    }

    // public function show($purchase_id){
    //     // Fetch data from Purchases table along with related status and supplier
    //     $showData = sales::join('statuses', 'sales.sales_status', '=', 'statuses.id')
    //                         ->join('suppliers', 'sales.suppliers_id', '=', 'suppliers.supplier_id')
    //                         ->where('sales.sales_id', $purchase_id)
    //                         ->first();

    //     // Fetch associated products for the given purchase
    //     $indexOrder = P_order::join('products', 'p_orders.product_id', '=', 'products.product_id')
    //                         ->where('p_orders.sales_id', $purchase_id)
    //                         ->get();

    //     return view('backend/sales/show', compact('showData', 'indexOrder'));
    // }

    // public function invice($purchase_id){
    //     // Fetch data from Purchases table along with related status and supplier
    //     $showData = sales::join('statuses', 'sales.sales_status', '=', 'statuses.id')
    //                         ->join('suppliers', 'sales.suppliers_id', '=', 'suppliers.supplier_id')
    //                         ->where('sales.sales_id', $purchase_id)
    //                         ->first();

    //     // Fetch associated products for the given purchase
    //     $indexOrder = P_order::join('products', 'p_orders.product_id', '=', 'products.product_id')
    //                         ->where('p_orders.sales_id', $purchase_id)
    //                         ->get();
    //     // $quantitySum = P_order::where('p_orders.sales_id', $purchase_id)->sum('p_product_quantity');
    //     return view('backend/sales/invoice', compact('showData', 'indexOrder'));
    // }

    // public function destroy($sales_id){
    //     $destroyDatas = sales::find($sales_id)->delete();
    //     $destroyData = P_order::where('sales_id', $sales_id)->delete();
    //     Session::flash('msg','Data delete successfully');
    //     return redirect()->route('sales.index');
    // }
}
