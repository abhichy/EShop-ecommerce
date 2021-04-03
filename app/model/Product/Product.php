<?php

namespace App\model\Product;

use Illuminate\Database\Eloquent\Model;
use Image;
use App\model\Specification\Specifications;
use App\model\Heading\Heading;
class Product extends Model
{
/*    protected $fillable = ['category_id','brand_id','type_id','subcategory_id','vendor_id','product_name','product_description','product_price','sell_unit','product_quantity','discount','currency','product_image'];*/


    protected $guarded = [];


    //Database relationship-----------------
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
    public function vendor()
    {
        return $this->belongsTo('App\model\Vendor\VendorAuth');
    }

    public function color_size()
    {
        return $this->hasMany('App\model\ColorSize\ColorSize',"product_id");
    }
    
    // public function heading()
    // {
    //     return $this->hasMany('App\model\Heading\Heading',"product_id");
    // }

    public function productImage()
    {
        return $this->hasMany('App\model\ProductImage\ProductImage',"product_id");
    }

    // for save product
    // public static function save_product_info($request)
    // {
    //     $request->validate([

    //         'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         ]);
    //          $image     =$request->file('product_image');
    //          $imageName =$image->getClientOriginalName();
    //          $directory ='public/product_image/';
    //          $img = Image::make($image)->resize(90, 90)->save($directory.$imageName);
    //          $product   = new Product();
    //          $product->type_id                = $request->type_id;
    //          $product->category_id            = $request->category_id;
    //          $product->product_image          = $directory.$imageName;
    //          if ($request->cat_level_three) {
    //             $product->subcategory_id      = $request->cat_level_three;
    //          }
    //          elseif ($request->cat_level_two) {
    //             $product->subcategory_id      = $request->cat_level_two;
    //          }
    //          else {
    //             $product->subcategory_id      = $request->cat_level_one;
    //          }

    //          $product->brand_id               = $request->brand_id;
    //          $product->type_id                = $request->type_id;
    //          $product->vendor_id              = $request->vendor_id;
    //          $product->product_name           = $request->product_name;
    //          $product->product_description    = $request->product_description;
    //         //  $product->product_specification    = $request->product_specification;
    //          $product->product_price          = $request->product_price;
    //          $product->model_number           = $request->model_number;
    //          $product->sell_unit              = $request->sell_unit;
    //          $product->product_quantity       = $request->product_quantity;
    //          $product->discount               = $request->discount;
    //          $product->discount_percent       = $request->discount_percent;
    //          $product->currency               = $request->currency;
    //         //  $product->sell_status         = $request->sell_status;
    //         //  $product->status              = $request->status;
    //          $product->save();
             
    //          $spec=$request->product_specification;
    //          $heading_list   = $request->heading_id;
    //          $hCount=count($heading_list);
    //          for($i=0;$i<$hCount;$i++){
    //              $text=$spec[$i];
    //              return $text;
    //              $heading_id=$heading_list[$i];
    //              if(!empty($text)){
    //                  $specification = new Specifications();
    //                  $specification->heading = $heading_id;
    //                  $specification->product_id = $product->id;
    //                  $specification->specification = $text;
    //                  $specification->save();
    //              }
    //          }
             
          
             
    // }
     // for save product
    public static function save_product_info($request)
    {
        $request->validate([

            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             $image     =$request->file('product_image');
             $imageName =$image->getClientOriginalName();
             $directory ='public/product_image/';
             $img = Image::make($image)->resize(200, 200)->save($directory.$imageName);
             $product   = new Product();
             $product->type_id                = $request->type_id;
             $product->category_id            = $request->category_id;
             $product->product_image          = $directory.$imageName;
             if ($request->cat_level_three) {
                $product->subcategory_id      = $request->cat_level_three;
             }
             elseif ($request->cat_level_two) {
                $product->subcategory_id      = $request->cat_level_two;
             }
             else {
                $product->subcategory_id      = $request->cat_level_one;
             }

             $product->brand_id               = $request->brand_id;
             $product->type_id                = $request->type_id;
             $product->vendor_id              = $request->vendor_id;
             $product->product_name           = $request->product_name;
             $product->product_description    = $request->product_description;
            //  $product->product_specification    = $request->product_specification;
             $product->product_price          = $request->product_price;
             $product->model_number           = $request->model_number;
             $product->sell_unit              = $request->sell_unit;
             $product->product_quantity       = $request->product_quantity;
             $product->discount               = $request->discount;
             $product->discount_percent       = $request->discount_percent;
             $product->currency               = $request->currency;
            //  $product->sell_status         = $request->sell_status;
            //  $product->status              = $request->status;
             $product->save();
             
             $spec=$request->product_specification;
             $heading_list   = $request->heading_id;
             $hCount=count($heading_list);
             for($i=0;$i<$hCount;$i++){
                 $text=$spec[$i];
                 return $text;
                 $heading_id=$heading_list[$i];
                 if(!empty($text)){
                     $specification = new Specifications();
                     $specification->heading = $heading_id;
                     $specification->product_id = $product->id;
                     $specification->specification = $text;
                     $specification->save();
                 }
             }
             
          
             
    }


    public static function update_product_info($request)
    {
        
        
        

    }

}
