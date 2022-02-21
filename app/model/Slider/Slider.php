<?php

namespace App\model\Slider;

use Illuminate\Database\Eloquent\Model;
use Image;

class Slider extends Model
{
    protected $fillable=['slider_title','content','slider','slider_image'];

    public static function save_slider_info($request)
    {
        $request->validate([

            'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slider_title' => 'required|max:30|min:3',
            'content'      => 'required|max:30|min:3',
            'status'       => 'required'
            ]);
    
            $image     =$request->file('slider_image');
            $imageName =$image->getClientOriginalName();
            $directory ='slider_image/';
            $img = Image::make($image)->save($directory.$imageName)->resize(300, 200);
            $slider   = new Slider();
            $slider->slider_title   = $request->slider_title;
            $slider->content        = $request->content;
            $slider->status         = $request->status;
            $slider->slider_image   = $directory.$imageName;
            $slider->save();
    }

     // for update sub category-----------------
     public static function update_slider_info($request)
     {  
        $request->validate([

            'slider_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slider_title' => 'required|max:30|min:3',
            'content'      => 'required|max:30|min:3',
            ]);

         $image = $request->file('slider_image');
         if ($image) 
         {
             $slider = Slider::find($request->id);
             unlink($slider->slider_image);
             $imageName = $image->getClientOriginalName();
             $directory ='slider_image/';
             $img = Image::make($image)->save($directory.$imageName)->resize(300, 200);
             $slider->slider_image    = $directory.$imageName;
             $slider->slider_title    = $request->slider_title;
             $slider->content         = $request->content;
             $slider->status          = $request->status;
             $slider->save();
            
         }
         
         else
         {    
             $slider = Slider::find($request->id);
             $slider->slider_title = $request->slider_title;
             $slider->content      = $request->content;
             $slider->status       = $request->status;
             $slider->save();
         }
     }
}
