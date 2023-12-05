<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function balance() {
        return view('backend/balancereport/index');
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


