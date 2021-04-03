<?php

namespace App\model\Category;

use Illuminate\Database\Eloquent\Model;
use Image;

class Category extends Model
{
    protected $fillable=['root_id','category_name','home_page','category_image'];

    // Database relationship-------------

    public function subcategory(){

        return $this->hasMany('App\model\Category\Category', 'root_id');

    }

    public function product()
    {
        return $this->hasMany('App\model\Product\Product');
    }

    // for category save------------
    public static function save_category_info($request)
    {
        $request->validate([

        'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_name'  => 'required|max:10|min:3'
        ]);
        $image     =$request->file('category_image');
        $imageName =$image->getClientOriginalName();
        $directory ='public/category_image/';
        $img = Image::make($image)->resize(300, 300)->save($directory.$imageName);
        $category   = new Category();
        $category->root_id                = $request->root_id;
        $category->category_name          = $request->category_name;
        $category->short_name             = $request->short_name;
        $category->home_page              = $request->home_page;
        $category->category_image         = $directory.$imageName;
        $category->save();
    }
    // for update category------------------
    public static function update_category_info($request)
    {
        $image = $request->file('category_image');
        if ($image)
        {
            $category = Category::find($request->id);
            unlink($category->category_image);
            $imageName = $image->getClientOriginalName();
            $directory ='public/category_image/';
            //$img = Image::make($image)->resize(300, 300)->save($directory.$imageName);
            $img = Image::make($image)->save($directory.$imageName);
            $category->category_image  = $directory.$imageName;
            $category->category_name   = $request->category_name;
            $category->save();

        }

        else
        {
            $category = Category::find($request->id);
            $category->category_name = $request->category_name;
            $category->save();
        }
    }

    // for save sub category --------
    public static function save_subcategory_info($request)
    {
        $request->validate([

            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_name'  => 'required|max:10|min:1'
            ]);
            $image     =$request->file('category_image');
            $imageName =$image->getClientOriginalName();
            $directory ='public/category_image/';
            $img = Image::make($image)->resize(200, 200)->save($directory.$imageName);
            $category   = new Category();
            $category->root_id                = $request->root_id;
            $category->category_name          = $request->category_name;
            $category->short_name             = $request->short_name;
            $category->home_page              = $request->home_page;
            $category->category_image         = $directory.$imageName;
            $category->save();
    }

    // for update sub category-----------------
    public static function update_subcategory_info($request)
    {
        $image = $request->file('category_image');
        if ($image)
        {
            $category = Category::find($request->id);
            unlink($category->category_image);
            $imageName = $image->getClientOriginalName();
            $directory ='public/category_image/';
            $img = Image::make($image)->resize(200, 200)->save($directory.$imageName);
            $category->category_image  = $directory.$imageName;
            $category->category_name   = $request->category_name;
            $category->save();

        }

        else
        {
            $category = Category::find($request->id);
            $category->category_name = $request->category_name;
            $category->save();
        }
    }
}
