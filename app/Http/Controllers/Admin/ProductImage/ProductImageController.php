<?php

namespace App\Http\Controllers\Admin\ProductImage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\ProductImage\ProductImage;
use Image;

class ProductImageController extends Controller
{
    
    // for save multiple product Image---------
    public function save_productImage(Request $request)
    {
        ProductImage::save_product_info($request);
        return back();
        
    }
    // for delete multiple product image-------------

    public function productImage_delete($id)
    {
        $Image = ProductImage::find($id);
        if(file_exists($Image->product_image))
        {
        unlink($Image->product_image);
        }
        $Image->delete();
        return back();
    }
}
