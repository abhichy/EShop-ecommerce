<?php

namespace App\Http\Controllers\Vendor\product;

use App\Http\Controllers\Controller;
use App\model\Category\Category;
use App\model\Product\Product;
use App\model\Type\Type;
use App\model\Vendor\Brand;
use App\model\Vendor\VendorProduct;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{

    public function authcheck()
    {
        $admin = Session::get('vendorid');
        if ($admin == NULL) {
            return redirect('vendor-login')->send();
        }
    }

    public function vendor_add_product()
    {

        $this->authcheck();

        $productCategory = Category::where('root_id',0)->get();
        $vid             = Session::get('vendorid');
        $vendor_brand    = Brand::where('vendor_id',"=",$vid)->get();
        $types           = Type::all();
        return view('Vendor.Product.vendor_add_product',[
            'productCategory' => $productCategory,
            'vendor_brand'	   => $vendor_brand,
            'types'           => $types
        ]);
    }

    public function vendor_save_product(Request $request)
    {

        $this->authcheck();


        VendorProduct::vendor_save_product_info($request);



        return redirect('vendor-add-product')->with('message','vendor product saved successfully!!');
    }

    public function vendor_manage_product()
    {

        $this->authcheck();
        $vid            = Session::get('vendorid');
        $vendor_product = VendorProduct::where('vendor_id',"=",$vid)->get();
        return view('Vendor.Product.vendor_manage_product',[
            'vendor_product' => $vendor_product

        ]);
    }

    public function vendor_details_product($id)
    {
        $this->authcheck();
        $product       = Product::find($id);
        $size          = $product->color_size;
        $productimg    = $product->productImage;

        // echo "<pre>";
        // print_r($productimg);
        // exit();


        return view('Vendor.Product.vendor_details_product')
            ->with("product",$product)
            ->with("size_list",$size)
            ->with("pro_image",$productimg);

    }

    public function vendor_edit_product($id)
    {
        $this->authcheck();
        $product         = VendorProduct::find($id);
        $productCategory = Category::where('root_id',0)->get();
        $subCategories   = Category::where('root_id','!=',0)->get();
        $vid             = Session::get('vendorid');
        $vendor_brand    = Brand::where('vendor_id',"=",$vid)->get();
        $types           = Type::all();
        return view('Vendor.Product.vendor_edit_product',[
            'product'         => $product,
            'productCategory' => $productCategory,
            'vendor_brand'    => $vendor_brand,
            'types'           => $types,
            'subCategories'  => $subCategories,
        ]);
    }

    public function vendor_update_product(Request $request)
    {
        $this->authcheck();
        VendorProduct::vendor_update_product_info($request);
        return redirect('vendor-manage-product')->with('message','product updated successfully!!');
    }


}

