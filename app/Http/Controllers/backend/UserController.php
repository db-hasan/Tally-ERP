<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;

class UserController extends Controller
{
    public function index() {
        $indexUser = User::all();
        return view('backend/user/index', compact('indexUser'));
    }

    // public function destroy($id=null){
    //     $destroyUser = User::find($id);
    //     $destroyUser->delete();
    //     Session::flash('msg','Data delete successfully');
    //     return redirect()->route('user');
    // }
}
