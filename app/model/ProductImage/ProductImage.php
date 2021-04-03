<?php

namespace App\model\ProductImage;

use Illuminate\Database\Eloquent\Model;

use Image;

class ProductImage extends Model
{
    protected $table    = 'product_images';
    protected $fillable = ['product_id','product_image','featured_image'];

    // for product image save
    public static function save_product_info($request)
    {
        $image     = $request->file('product_image');
        $imageName = $image->getClientOriginalName();
        $directory ='public/product_image/';
        $img = Image::make($image)->resize(200, 200)->save($directory.$imageName);
        $productImage = new ProductImage();
        $productImage->product_id      = $request->product_id;
        $productImage->featured_image  = $request->featured_image;
        $productImage->product_image   = $directory.$imageName;
        $productImage->save();
    }

    public function vendorProduct()
    {
        return $this->hasmany('App\model\Vendor\VendorProduct','id');
    }

    public function product()
    {
        return $this->hasmany('App\model\Product\Product','id');
    }
}
