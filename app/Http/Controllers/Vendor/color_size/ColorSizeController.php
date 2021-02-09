<?php

namespace App\Http\Controllers\Vendor\color_size;

use App\Http\Controllers\Controller;
use App\model\ColorSize\ColorSize;
use Illuminate\Http\Request;

class ColorSizeController extends Controller
{

    public function vendor_save_sizecolor(Request $request)
    {
        ColorSize::save_size_colorinfo($request);
        return redirect('vendor-manage-product')->with('message','color & size added succesfully!!');
    }

}
