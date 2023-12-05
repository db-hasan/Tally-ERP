<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Status;
use Session;

class CollectionController extends Controller
{
    public function index() {
        $indexcollection = Collection::join('customars', 'collections.customar_id', '=', 'customars.customar_id')->get();
        return view('backend/collection/index', compact('indexcollection'));
    }

}


