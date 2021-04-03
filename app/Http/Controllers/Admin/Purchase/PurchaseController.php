<?php

namespace App\Http\Controllers\Admin\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Vendor\VendorAuth;
use App\model\Product\Product;

class PurchaseController extends Controller
{
    public function purchase_create()
    {
        $product = Product::all();
        $vendor = VendorAuth::all();
        return view('Admin.purchase.purchase_creation',[
            'vendor'=>$vendor,
            'product'=>$product
        ]);
    }


    public function save_transection(Request $request)
    {
        // return $request->all();

        foreach($request->quantity as $qty){

        }
    }


    public function products()
    {
        $product = Product::all();
        return $product;
    }


    public function product_wise_price($id)
    {
        return Product::where('id',$id)->first();
    }
}
