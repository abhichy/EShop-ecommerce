<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Brand\Brand;
use Image;
use Auth;

class BrandController extends Controller
{
    
    public function manage_brand()
    {   
        $brand = Brand::all();
        return view('Admin.brand.manage_brand',compact('brand'));
    }
    
    public function save_brand(Request $request)
    {
        $brand  = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->admin_id   = Auth::user()->id;
        $brand->save();
        return redirect()->back()->with('message','brand added successfully!!');
        
    }
}