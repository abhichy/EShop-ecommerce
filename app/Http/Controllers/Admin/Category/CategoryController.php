<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Category\Category;
use Image;

class CategoryController extends Controller
{

    // for add category------------
    public function add_category()
    {
        return view('Admin.category.add_category');
    }

   // for save category -----------
    public function save_category(Request $request)
    {
        Category::save_category_info($request);
        return back()->with('message','category saved successfully!!');
    }
    // for category list-----------
    public function manage_category()
    {
        $categories = Category::where('root_id',0)->get();
        return view('Admin.category.manage_category',[
            'categories' => $categories
        ]);
    }
    // for category details---------
    public function details_category($id)
    {
        $category = Category::find($id);
        return view('Admin.category.category_details',[
            'category' => $category
        ]);
    }
    // for category edit------------
    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('Admin.category.edit_category',[
            'category' => $category
        ]);
    }
    // for category update----------
    public function update_category(Request $request)
    {
        Category::update_category_info($request);
        return redirect('manage-category')->with('message','category updated successfully!!');
    }

    // for  sub category---------
    public function manage_subcategory($id)
    {
         $category   = Category::find($id);
        $categories = Category::where('root_id',$id)->get();
        return view('Admin.category.manage_subcategory',[
            'category'   => $category,
            'categories' => $categories
        ]);
    }

    // for add sub category -----------
    public function add_subcategory($id)
    {
        $category = Category::find($id);
        return view('Admin.category.add_subcategory',[
            'category' => $category
        ]);
    }

    // for save sub category ---------
    public function save_subcategory(Request $request)
    {
        Category::save_subcategory_info($request);
        return back()->with('message','subcategory  saved successfully!!');
    }

    // for sub category details---------
    public function details_subcategory($id)
    {
        $category = Category::find($id);
        return view('Admin.category.subcategory_details',[
            'category' => $category
        ]);
    }
    // for edit subcategory--------------
    public function edit_subcategory($id)
    {
        $category = Category::find($id);
        return view('Admin.category.edit_subcategory',[
            'category' => $category
        ]);
    }
    public function update_subcategory(Request $request)
    {
        Category::update_subcategory_info($request);
        return redirect('manage-category')->with('message','category updated successfully!!');
    }
}
