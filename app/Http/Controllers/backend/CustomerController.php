<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Status;
use Session;

class CustomerController extends Controller
{
    public function index() {
        $indexCustomer = Customer::join('statuses', 'customers.customer_status', '=', 'statuses.id')->get();
        return view('backend/customer/index', compact('indexCustomer'));
    }

    public function create(){
        return view('backend/customer/create');
    }

    public function store(Request $request){
        $rules = [
            'customer_name' => 'required|max:50',
            'customer_phone' => 'required|max:50',
            'customer_address' => 'required|max:50',
        ];
        
        $v_msg = [
            'customer_name.required'=> 'Enter customer name.',
            'customer_phone.required'=> 'Enter customer Phone.',
            'customer_address.required'=> 'Enter customer Address.',
        ];
        
        $this->validate($request, $rules, $v_msg);

        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->save();
        
        Session::flash('msg', 'Data submitted successfully');
        return redirect()->route('customer.index');
    }
        public function edit($customer_id){
            $indexData['indexData'] = Customer::find($customer_id);
            $indexData['indexStatus'] = Status::all();      
            return view('backend/customer/edit', $indexData);
        }
        public function update(Request $request, $customer_id){
        $rules = [
            'customer_name' => 'required|max:50',
            'customer_phone' => 'required|max:50',
            'customer_address' => 'required|max:50',
            'status' => 'required', // Add validation for status field
        ];
        
        $v_msg = [
            'customer_name.required'=> 'Enter customer name.',
            'customer_phone.required'=> 'Enter customer Phone.',
            'customer_address.required'=> 'Enter customer Address.',
            'status.required' => 'Select customer status.', // Message for status validation
        ];
        
        $this->validate($request, $rules, $v_msg);

        $customer = Customer::find($customer_id);
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->customer_status = $request->status; // Update customer status
        $customer->save();
        
        Session::flash('msg', 'Data submitted successfully');
        return redirect()->route('customer.index');
    }

    public function destroy($customer_id=null){
        $destroyData = Customer::find($customer_id);
        $destroyData->delete();
        Session::flash('msg','Data delete successfully');
        return redirect()->route('customer.index');
    }


}
