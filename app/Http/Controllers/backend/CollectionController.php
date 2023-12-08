<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Customar;
use App\Models\Status;
use Session;

class CollectionController extends Controller
{
    public function index() {
        $indexcollection = Collection::join('customars', 'collections.customar_id', '=', 'customars.customar_id')->get();
        return view('backend/collection/index', compact('indexcollection'));
    }

    public function create(){
        $indexData['indexCustomar']= Customar::all();
        return view('backend/collection/create', $indexData);
    }
    public function store(Request $request){
        $rules = [
            'customar_name' => 'required|string|max:50',
            'payment' => 'required|max:50',
        ];
        $v_msg=[
            'customar_name.required'=> 'Select customar name',
            'payment.required'=> 'Please enter Amount',
        ];
        $this -> validate($request, $rules, $v_msg);

        $data= new Collection();
        $data->customar_id= $request->customar_name;
        $data->payment= $request->payment;
        $data->save();
        Session::flash('msg','Data submit successfully');
        return redirect()->route('collection.index');
    }

    public function edit($collection_id=null){
        $indexData['indexData'] = Collection::find($collection_id);
        $indexData['indexCustomar']= Customar::all();        
        return view('backend/collection/edit', $indexData);
    }
    
    public function update(Request $request, $collection_id){
        $rules = [
            'customar_name' => 'required | max:50',
            'payment' => 'required | max:50',
        ];
        $v_msg=[
            'customar_name.required'=> 'Select customar name',
            'payment.required'=> 'Please enter Amount',
        ];
        $this -> validate($request, $rules, $v_msg);

        $data= Collection::find($collection_id);
        $data->customar_id= $request->customar_name;
        $data->payment= $request->payment;
        $data->save();
        Session::flash('msg','Data submit successfully');
        return redirect()->route('collection.index');
    }

    public function destroy($collection_id=null){
        $destroyData = Collection::find($collection_id);
        $destroyData->delete();
        Session::flash('msg','Data delete successfully');
        return redirect()->route('collection.index');
    }
}


