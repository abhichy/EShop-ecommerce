<?php

namespace App\Http\Controllers\Admin\Heading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Vendor\VendorAuth;
use App\model\Vendor\Brand;
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
    
    
}


