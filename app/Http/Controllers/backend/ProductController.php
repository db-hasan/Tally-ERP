<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Status;
use Session;

class ProductController extends Controller
{
    public function index() {
        $indexproduct = Product::join('statuses', 'products.product_status', '=', 'statuses.id')->get();
        return view('backend/product/index', compact('indexproduct'));
    }

    public function create(){
        return view('backend/product/create');
    }

    public function store(Request $request){
            $rules = [
                'category_name' => 'required | max:50',
                'brand_name' => 'required | max:50',
                'product_name' => 'required | max:50',
                'product_des' => 'required | max:255',
                'manufacturing_cost' => 'required | max:50',
                'selling_price' => 'required | max:50',
                'product_quantity' => 'required | max:50',
                'product_sku' => 'required | max:50',
                'product_img' => 'required | max:255',

            ];
            $v_msg=[
                'category_name.required'=> 'Please enter category',
                'brand_name.required'=> 'Please enter brand',
                'product_name.required'=> 'Please enter product',
                'product_des.required'=> 'Please enter decription',
                'manufacturing_cost.required'=> 'Please enter product Manufacturing Cost',
                'selling_price.required'=> 'Please enter product Selling Price',
                'product_quantity.required'=> 'Please enter product Quantity',
                'product_sku.required'=> 'Please enter product SKU',
                'product_img.required'=> 'Please enter product image',
            ];
            $this -> validate($request, $rules, $v_msg);

            $imageName = time().'.'. $request->product_img->extension();
            $request->product_img->move(public_path('images'),$imageName);

            $data= new Product();
            $data->category_name= $request->category_name;
            $data->brand_name= $request->brand_name;
            $data->product_name= $request->product_name;
            $data->product_des= $request->product_des;
            $data->manufacturing_cost= $request->manufacturing_cost;
            $data->selling_price= $request->selling_price;
            $data->product_quantity= $request->product_quantity;
            $data->product_sku= $request->product_sku;
            $data->product_img= $imageName;
            $data->save();
            Session::flash('msg','Data submit successfully');
            return redirect()->route('product.index');
        }



    public function edit($product_id=null){
        $indexData['indexData'] = Product::find($product_id);
        $indexData['indexStatus']= Status::all();      
        return view('backend/product/edit', $indexData);
    }

     public function update(Request $request, $product_id){
            $rules = [
                'category_name' => 'required | max:50',
                'brand_name' => 'required | max:50',
                'product_name' => 'required | max:50',
                'product_des' => 'required | max:255',
                'manufacturing_cost' => 'required | max:50',
                'selling_price' => 'required | max:50',
                'product_quantity' => 'required | max:50',
                'product_sku' => 'required | max:50',
            ];
            $v_msg=[
                'category_name.required'=> 'Please enter category',
                'brand_name.required'=> 'Please enter brand',
                'product_name.required'=> 'Please enter product',
                'product_des.required'=> 'Please enter decription',
                'manufacturing_cost.required'=> 'Please enter product Manufacturing Cost',
                'selling_price.required'=> 'Please enter product Selling Price',
                'product_quantity.required'=> 'Please enter product Quantity',
                'product_sku.required'=> 'Please enter product SKU',
            ];
            $this -> validate($request, $rules, $v_msg);

            $data= Product::find($product_id);
            $data->category_name= $request->category_name;
            $data->brand_name= $request->brand_name;
            $data->product_name= $request->product_name;
            $data->product_des= $request->product_des;
            $data->manufacturing_cost= $request->manufacturing_cost;
            $data->selling_price= $request->selling_price;
            $data->product_quantity= $request->product_quantity;
            $data->product_sku= $request->product_sku;
            if ($request->hasFile('product_img')) {
                $imageName = time().'.'.$request->product_img->extension();
                $request->product_img->move(public_path('images'), $imageName);
                $data->product_img = $imageName; // Update the image name
            }
            $data->product_status= $request->status;
            $data->save();
            Session::flash('msg','Data submit successfully');
            return redirect()->route('product.index');
        }

    public function show($product_id=null){
        $showData = Product::join('statuses', 'products.product_status', '=', 'statuses.id')->find($product_id);
        return view('backend/product/show', compact('showData'));
    }

    public function destroy($product_id=null){
            $destroyData = Product::find($product_id);

            // Delete associated image file
            if ($destroyData->product_img) {
                $imagePath = public_path('images/') . $destroyData->product_img; // Path to the image file
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Remove the image file from the directory
                }
            }

            // Delete the product
            $destroyData->delete();

            Session::flash('msg','Data deleted successfully');
            return redirect()->route('product.index');
        }
}


