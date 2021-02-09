<?php

namespace App\Http\Controllers\Admin\ColorSize;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\ColorSize\ColorSize;

class ColorSizeController extends Controller
{
    public function save_size_color(Request $request)
    {
        ColorSize::save_size_colorinfo($request);
        return back();
    }
}
