<?php

namespace App\Http\Controllers\Admin\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Vendor\VendorAuth;
class SalesController extends Controller
{
    public function index()
    {
        $vendor = VendorAuth::all();
        return view('Admin.sales.sales_create',compact('vendor'));
    }
}
