<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Status;
use Session;

class StockController extends Controller
{
    public function index() {
        $indexstock = Stock::join('products', 'stocks.product_id', '=', 'products.product_id')->get();
        return view('backend/stock/index', compact('indexstock'));
    }

    public function create(){
        $indexData['indexproduct']= Product::all();
        return view('backend/stock/create', $indexData);
    }
    public function store(Request $request){
        $rules = [
            'product_name' => 'required|string|max:50',
            'stock_quantity' => 'required|max:50',
        ];
        $v_msg=[
            'product_name.required'=> 'Select product name',
            'stock_quantity.required'=> 'Please enter Amount',
        ];
        $this -> validate($request, $rules, $v_msg);

        $data= new Stock();
        $data->product_id= $request->product_name;
        $data->stock_quantity= $request->stock_quantity;
        $data->save();

        $stock= Product::where('product_id', $request->product_name)->first();
        $stock->product_quantity=$stock->product_quantity + $request->stock_quantity;;
        $stock->save();
        
        Session::flash('msg','Data submit successfully');
        return redirect()->route('stock.index');
    }

    public function edit($stock_id=null){
        $indexData['indexData'] = Stock::find($stock_id);
        $indexData['indexproduct']= product::all();        
        return view('backend/stock/edit', $indexData);
    }
    
    public function update(Request $request, $stock_id){
        $rules = [
            'product_name' => 'required | max:50',
            'stock_quantity' => 'required | max:50',
        ];
        $v_msg=[
            'product_name.required'=> 'Select product name',
            'stock_quantity.required'=> 'Please enter Stock',
        ];
        $this -> validate($request, $rules, $v_msg);

        $data= Stock::find($stock_id);
        $data->product_id= $request->product_name;
        $data->stock_quantity= $request->stock_quantity;
        $data->save();
        Session::flash('msg','Data submit successfully');
        return redirect()->route('stock.index');
    }

    public function destroy($stock_id=null){
        $destroyData = Stock::find($stock_id);
        $destroyData->delete();
        $stock= Product::where('product_id', $destroyData->product_id)->first();
        $stock->product_quantity=$stock->product_quantity - $destroyData->stock_quantity;
        $stock->save();
        Session::flash('msg','Data delete successfully');
        return redirect()->route('stock.index');
    }

}
