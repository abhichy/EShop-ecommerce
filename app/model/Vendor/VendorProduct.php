<?php

namespace App\model\Vendor;

use App\model\Product\Product;
use App\model\ProductImage\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Image;

class VendorProduct extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id', 'subcategory_id', 'type_id', 'brand_id', 'vendor_id', 'product_name', 'product_description', 'product_price', 'sell_unit', 'product_quantity', 'discount', 'currency', 'product_image'];


    // database relationship-----------
    // public function vendor()
    // {
    // 	return $this->belongsTo('App\model\vendor');
    // }

    public function category()
    {
        return $this->belongsTo('App\model\Category\Category');
    }


    public function brand()
    {
        return $this->belongsTo('App\model\Vendor\Brand');
    }

    public function type()
    {
        return $this->belongsTo('App\model\Type\Type');
    }

    public function color_size()
    {
        return $this->hasMany('App\model\ColorSize\ColorSize', "product_id");
    }

    public function productImage()
    {
        return $this->hasMany('App\model\ProductImage\ProductImage', "product_id");
    }

    // end databse relationship-----------

    public static function vendor_save_product_info($request)
    {

        $request->validate([

            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9216',
        ]);

        $image = $request->file('product_image');
        $imageName = $image->getClientOriginalName();
        $directory = 'public/product_image/';
        //$image->move($directory,$imageName);
        $img = Image::make($image)->resize(200, 200)->save($directory . $imageName);


        $product = new VendorProduct();
        $product->type_id = $request->type_id;
        $product->category_id = $request->category_id;
        $product->product_image = $directory . $imageName;
        if ($request->cat_level_three) {
            $product->subcategory_id = $request->cat_level_three;
        } elseif ($request->cat_level_two) {
            $product->subcategory_id = $request->cat_level_two;
        } else {
            $product->subcategory_id = $request->cat_level_one;
        }

        $product->brand_id = $request->brand_id;
        $product->type_id = $request->type_id;
        $product->vendor_id = $request->vendor_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_specification = $request->product_specification;
        $product->product_price = $request->product_price;
        $product->sell_unit = $request->sell_unit;
        $product->product_quantity = $request->product_quantity;
        $product->discount = $request->discount;
        $product->currency = $request->currency;

        $product->save();
    }

    public static function vendor_update_product_info($request)
    {

        $image = $request->file('product_image');

        if ($image) {

            $product = Product::find($request->id);
            //unlink($product->product_image);
            $imageName = $image->getClientOriginalName();
            $directory = 'public/product_image/';
            //$image->move($directory,$imageName);
            $img = Image::make($image)->resize(200, 200)->save($directory . $imageName);

            $product->category_id = $request->category_id;

            if ($request->cat_level_one) {
                $product->subcategory_id      = $request->cat_level_one;
            }
            elseif ($request->cat_level_two) {
                $product->subcategory_id      = $request->cat_level_two;
            }
            else {
                $product->subcategory_id      = $request->cat_level_three;
            }

            $product->product_image = $directory . $imageName;
            $product->brand_id = $request->brand_id;
            $product->type_id = $request->type_id;
            $product->vendor_id = $request->vendor_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_specification = $request->product_specification;
            $product->product_price = $request->product_price;
            $product->sell_unit = $request->sell_unit;
            $product->product_quantity = $request->product_quantity;
            $product->discount = $request->discount;
            $product->currency = $request->currency;
            $product->save();
        } else {

            $product = Product::find($request->id);

            $product->category_id = $request->category_id;

            if ($request->cat_level_one) {
                $product->subcategory_id      = $request->cat_level_one;
            }
            elseif ($request->cat_level_two) {
                $product->subcategory_id      = $request->cat_level_two;
            }
            else {
                $product->subcategory_id      = $request->cat_level_three;
            }

            $product->brand_id = $request->brand_id;
            $product->type_id = $request->type_id;
            $product->vendor_id = $request->vendor_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_specification = $request->product_specification;
            $product->product_price = $request->product_price;
            $product->sell_unit = $request->sell_unit;
            $product->product_quantity = $request->product_quantity;
            $product->discount = $request->discount;
            $product->currency = $request->currency;
            $product->save();

        }


    }


}

