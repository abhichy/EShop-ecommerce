<?php

namespace App\model\ColorSize;

use Illuminate\Database\Eloquent\Model;

class ColorSize extends Model
{
    protected $fillable = ['product_id','color','size','quantity'];
    
    // for size color save info-----
    public static function save_size_colorinfo($request)
    {
        $colorsize = new ColorSize();
        $colorsize->product_id = $request->product_id;
        $colorsize->color      = $request->color;
        $colorsize->size       = $request->size;
        $colorsize->quantity   = $request->quantity;
        $colorsize->save();
    }
}
