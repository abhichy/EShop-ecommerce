<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Slider\Slider;


class SliderController extends Controller
{
    // for slider list----------
    public function manage_slider()
    {   $sliders = Slider::all();
        return view('Admin.Slider.manage_slider',[
            'sliders' => $sliders
        ]);
    }

    // for add slider -----------
    public function add_slider()
    {
        return view('Admin.Slider.add_slider');
    }

    // for save slider-------
    public function save_slider(Request $request)
    {
        Slider::save_slider_info($request);
        return back()->with('message','slider saved successfully!!');
    }

    // for details slider------
    public function slider_details($id)
    {
        $slider = Slider::find($id);
        return view('Admin.Slider.slider_details',[
            'slider' => $slider
        ]);
    }

    // for edit slider------
    public function edit_slider($id)
    {
        $slider = Slider::find($id);
        return view('Admin.Slider.edit_slider',[
            'slider' => $slider
        ]);
    }
    // for update slider------
    public function update_slider(Request $request)
    {
        Slider::update_slider_info($request);
        return redirect('manage-slider')->with('message','slider updated successfully!!');
    }

    // for delete slider-------
    public function delete_slider($id)
    {
        $slider = Slider::find($id);
        if(file_exists($slider->slider_image))
        {
            unlink($slider->slider_image);
        }
        $slider->delete();
        return redirect('manage-slider')->with('message','slider deleted successfully!!');
    }
}
