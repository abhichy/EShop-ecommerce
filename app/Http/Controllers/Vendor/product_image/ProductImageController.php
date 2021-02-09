<?php

namespace App\Http\Controllers\Vendor\product_image;

use App\Http\Controllers\Controller;
use App\model\Product\Product;
use App\model\ProductImage\ProductImage;
use Illuminate\Http\Request;
use Image;

class ProductImageController extends Controller
{

    public function vendor_addmoreimage(Request $request)
    {
        $request->validate([

            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image =$request->file('product_image');
        $imageName =$image->getClientOriginalName();
        $directory ='product_image/';
        //$image->move($directory,$imageName);
        $img = Image::make($image)->save($directory.$imageName)->resize(50, 50);
        $product_image = new ProductImage();
        $product_image->product_image        = $directory.$imageName;
        $product_image->product_id       = $request->product_id;
        $product_image->featured_image   = $request->featured_image;
        $product_image->save();




        return redirect('vendor-manage-product')->with('message','image saved successfully!!');
        // return $request->all();
    }

    public function vendor_deletemoreimage(Request $request)
    {

        $product_image = ProductImage::find($request->id);
        unlink($product_image->product_image);
        $product_image->delete();





        return redirect('vendor-manage-product')->with('message','image deleted successfully!!');
        // return $request->all();
    }


}
