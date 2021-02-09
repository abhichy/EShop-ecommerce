<?php

namespace App\Http\Controllers\Vendor\brand;

use App\Http\Controllers\Controller;
use App\model\Vendor\Brand;
use Illuminate\Http\Request;
use Session;

class brandController extends Controller
{

    public function authcheck()
    {
        $admin = Session::get('vendorid');
        if ($admin == NULL) {
            return redirect('vendor-login')->send();
        }
    }
//------------------------------------------------------
    public function vendor_manage_brand()
    {
        $this->authcheck();
        $vid=Session::get("vendorid");
        //exit();
        $vendor_brand = Brand::where('vendor_id',"=",$vid)->get();
        return view('Vendor.Brand.manage_brand',[
            'vendor_brand' => $vendor_brand
        ]);
    }


    public function vendor_save_brand(Request $request)
    {
        $this->authcheck();

        $this->validate($request, [
            'brand_name' => 'required',

        ]);

        $brand   = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->vendor_id  = $request->vendor_id;
        $brand->save();
        return redirect('vendor-manage-brand');
    }

    public function vendor_edit_brand($id)
    {
        $this->authcheck();
        $brand = Brand::find($id);
        echo "</pre>";
        print_r($brand);
        exit();
        return view('Vendor.Brand.manage_brand',[
            'brand' => $brand
        ]);
    }

}
