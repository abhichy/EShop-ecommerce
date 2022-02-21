<?php

namespace App\Http\Controllers\Admin\Heading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Vendor\VendorAuth;
use App\model\Heading\Heading;
use App\model\Category\Category;
use App\model\Type\Type;
use App\model\Product\Product;
use Image;
use DB;
class HeadingController extends Controller
{
    public function add_heading()
    {
        return view('Admin.Heading.add_heading');
    }
    
    public function save_heading(Request $request)
    {
        $heading = new Heading();
        $heading->heading = $request->heading;
        $heading->serial  = $request->serial;
        $heading->save();
        return redirect()->back()->with('message','heading saved successfully!!');
        
    }
    
    public function manage_heading(Request $request)
    {   
        $heading = Heading::all();
        return view('Admin.Heading.manage_heading',compact('heading'));
    }
    
    public function edit_heading($id)
    {   
        // return $id;
        $heading = Heading::find($id);
        return view('Admin.Heading.edit_heading',compact('heading'));
    }
    
    
    public function update_heading(Request $request)
    {
        $heading = Heading::find($request->id);
        $heading->heading = $request->heading;
        $heading->serial  = $request->serial;
        $heading->save();
        return redirect('manage-heading')->with('message','heading updated successfully!!');
    }
    
    
}


