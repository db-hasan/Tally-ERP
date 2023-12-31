<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customar;
use App\Models\Product;
use App\Models\Sales;
use App\Models\S_order;
use App\Models\Collection;
use App\Models\Status;
use Session;
use DB;

class SalesController extends Controller
{
    public function index() {
        $indexSales = Sales::join('customars', 'sales.sales_id', '=', 'customars.customar_id')->get();
        return view('backend/sales/index', compact('indexSales'));
    }

    public function create(){
        $indexData['indexProduct']= Product::all();
        return view('backend/sales/create', $indexData);
    }
    public function store(Request $request){    
        $rules = [
            'customar_name' => 'required|max:50',
            'customar_phone' => 'required|max:50',
            'customar_address' => 'required|max:50',
            'product_name' => 'required|max:50',
        ];
        
        $v_msg = [
            'customar_name.required'=> 'Enter Customar name.',
            'customar_phone.required'=> 'Enter Customar Phone.',
            'customar_address.required'=> 'Enter Customar Address.',
            'product_name.required'=> 'Select proudect name.',
        ];
        
        $this->validate($request, $rules, $v_msg);

        try { 
            DB::beginTransaction();

            $customar = new Customar();
            $customar->customar_name = $request->customar_name;
            $customar->customar_phone = $request->customar_phone;
            $customar->customar_address = $request->customar_address;
            $customar->save();

            $sales = new Sales();
            $sales->customar_id = $customar->customar_id;
            $sales->save();

            $collection = new Collection();
            $collection->customar_id = $customar->customar_id;
            $collection->payment = $request->payment;
            $collection->save();

            $types = $request->product_name;

            foreach ($types as $index => $type) {
                $sOrder = new S_order();
                $sOrder->sales_id = $sales->sales_id;
                $sOrder->customar_id = $customar->customar_id;
                $sOrder->product_id = $request->product_name[$index];
                $sOrder->order_quantity = $request->order_quantity[$index];
                $sOrder->save();
                $stock= Product::where('product_id', $sOrder->product_id)->first();
                $stock->product_quantity=$stock->product_quantity - $sOrder->order_quantity;
                $stock->save();
            }

            DB::commit();
            
            // Flash message and redirect moved outside the try block
            return redirect()->route('sales.index')->with('msg','Data submitted successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error','Ops! Data insert fail');
        }
    }
    
    public function invice($sales_id){
        // Fetch data from Purchases table along with related status and supplier
        $showData = sales::join('customars', 'sales.customar_id', '=', 'customars.customar_id')
                            ->join('collections', 'sales.customar_id', '=', 'collections.customar_id')
                            ->where('sales.sales_id', $sales_id)
                            ->first();

        // Fetch associated products for the given purchase
        $indexOrder = S_order::join('products', 's_orders.product_id', '=', 'products.product_id')
                            ->where('s_orders.sales_id', $sales_id)
                            ->get();

        return view('backend/sales/invoice', compact('showData', 'indexOrder'));
    }

    public function destroy($sales_id){
        $destroyDatas = Sales::find($sales_id)->delete();    
        $destroyData = S_order::where('sales_id', $sales_id)->delete();
    // Sales Delete korle stock table theke sale QTY + hoina
        // $stock= Product::where('product_id', $destroyData->product_id)->first();
        // $stock->product_quantity=$stock->product_quantity + $destroyData->order_quantity;
        // $stock->save();
        Session::flash('msg','Data delete successfully');
        return redirect()->route('sales.index');
    }
}

   

    
