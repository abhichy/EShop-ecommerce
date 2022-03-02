<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Vendor\VendorAuth;
use App\model\Vendor\Brand;
use App\model\Category\Category;
use App\model\Type\Type;
use App\model\Product\Product;
use App\model\Heading\Heading;
use App\model\Specification\Specifications;
use Image;
use DB;

class ProductController extends Controller
{
    // for product list-----------
    public function manage_product()
    {

        $vendors  = VendorAuth::where('activity', 1)->get();
        $category = Category::where('root_id', 0)->get();
        $brands   = Brand::all();
        $types    = Type::all();

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('vendor_auths', 'products.vendor_id', '=', 'vendor_auths.id')
            ->select('products.*', 'categories.category_name', 'vendor_auths.vendor_name')
            ->orderBy('products.id', 'desc')
            ->get();


        return view('Admin.Product.manage_product', [
            'products' => $products,
            'vendors' => $vendors,
            'types'   => $types,
            'category' => $category,
            'brands'  => $brands
        ]);
    }

    // for add product -----------

    public function add_product()
    {
        $vendors  = VendorAuth::where('activity', 1)->get();
        $category = Category::where('root_id', 0)->get();
        $brands   = Brand::all();
        $heading  = Heading::all();
        $types    = Type::all();
        return view('Admin.Product.add_product', [
            'vendors' => $vendors,
            'types'   => $types,
            'category' => $category,
            'brands'  => $brands,
            'heading' => $heading
        ]);
    }

    public function save_product(Request $request)
    {

        $request->validate([

            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image     = $request->file('product_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('product_image/' . $filename);
        Image::make($image)->resize(300, 300)->save($path);

        $product   = new Product();
        $product->type_id                = $request->type_id;
        $product->category_id            = $request->category_id;
        $product->product_image          =  'product_image/' . $filename;
        if ($request->cat_level_three) {
            $product->subcategory_id      = $request->cat_level_three;
        } elseif ($request->cat_level_two) {
            $product->subcategory_id      = $request->cat_level_two;
        } else {
            $product->subcategory_id      = $request->cat_level_one;
        }

        $product->brand_id               = $request->brand_id;
        $product->type_id                = $request->type_id;
        $product->vendor_id              = $request->vendor_id;
        $product->product_name           = $request->product_name;
        $product->product_description    = $request->product_description;
        $product->product_price          = $request->product_price;
        $product->model_number           = $request->model_number;
        $product->sell_unit              = $request->sell_unit;
        $product->product_quantity       = $request->product_quantity;
        $product->discount               = $request->discount;
        $product->discount_percent       = $request->discount_percent;
        $product->currency               = $request->currency;
        $product->save();
        return redirect('manage-product')->with('message', 'Product Saved Successfully!!');
    }

    // for product search filter.....................

    public function admin_search_filter(Request $request)
    {
        $product_name = "";
        $category = "";
        $subcategory = "";
        if (!empty($request->get('product'))) {
            $product_name   = $request->get('product');
        }
        if (!empty($request->get('category'))) {
            $category   = $request->get('category');
        }
        if (!empty($request->get('subcategory'))) {
            $subcategory   = $request->get('subcategory');
        }

        $products = Product::query()
            ->where(function ($filter) use ($product_name, $category, $subcategory) {
                if (!empty($product_name))
                    $filter->where('product_name', '=', $product_name);
                if (!empty($category))
                    $filter->where('category_id', '=', $category);
                if (!empty($subcategory))
                    $filter->where('subcategory_id', '=', $subcategory);
            })->get();

        // return $products;
        return view('Admin.Product.product_result', [
            'products' => $products
        ]);
    }

    public function edit_product($id)
    {
        $product         = Product::find($id);
        // $p = $product->id;
        $productCategory = Category::where('root_id', 0)->get();
        $subCategories   = Category::where('root_id', '!=', 0)->get();
        $brands          = Brand::all();
        $vendors         = VendorAuth::all();
        $types           = Type::all();

        $specification = DB::table('specifications')
            ->join('heading', 'specifications.heading', '=', 'heading.heading')
            ->select('specifications.*', 'heading.heading')
            ->where('product_id', '=', $product->id)
            ->get();


        // return $specification;
        // exit();
        return view('Admin.Product.edit_product', [
            'product'         => $product,
            'productCategory' => $productCategory,
            'brands'          => $brands,
            'vendors'         => $vendors,
            'types'           => $types,
            'subCategories'   => $subCategories,
            //  'headings'         => $headings ,
            //  'hs'         => $hs ,
            'specification'  => $specification
        ]);
    }

    public function update_product(Request $request)
    {

        $image = $request->file('product_image');

        if ($image) {
            $product = Product::find($request->id);
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('product_image/' . $filename);
            Image::make($image)->resize(300, 300)->save($path);
            $product = Product::find($request->id);
            $product->category_id            = $request->category_id;
            if ($request->cat_level_one) {
                $product->subcategory_id      = $request->cat_level_one;
            } elseif ($request->cat_level_two) {
                $product->subcategory_id      = $request->cat_level_two;
            } else {
                $product->subcategory_id      = $request->cat_level_three;
            }

            $product->product_image =  'product_image/' . $filename;
            $product->brand_id               = $request->brand_id;
            $product->type_id                = $request->type_id;
            $product->vendor_id              = $request->vendor_id;
            $product->product_name           = $request->product_name;
            $product->product_description    = $request->product_description;
            $product->product_specification  = $request->product_specification;
            $product->product_price          = $request->product_price;
            $product->sell_unit              = $request->sell_unit;
            $product->product_quantity       = $request->product_quantity;
            $product->discount               = $request->discount;
            $product->discount_percen        = $request->discount_percent;
            $product->currency               = $request->currency;
            $product->save();
        } else {

            $product = Product::find($request->id);
            $product->category_id            = $request->category_id;
            if ($request->cat_level_one) {
                $product->subcategory_id      = $request->cat_level_one;
            } elseif ($request->cat_level_two) {
                $product->subcategory_id      = $request->cat_level_two;
            } else {
                $product->subcategory_id      = $request->cat_level_three;
            }

            $product->brand_id               = $request->brand_id;
            $product->type_id                = $request->type_id;
            $product->vendor_id              = $request->vendor_id;
            $product->product_name           = $request->product_name;
            $product->product_description    = $request->product_description;
            $product->product_specification  = $request->product_specification;
            $product->product_price          = $request->product_price;
            $product->sell_unit              = $request->sell_unit;
            $product->product_quantity       = $request->product_quantity;
            $product->discount               = $request->discount;
            $product->status               = $request->status;
            $product->discount_percent               = $request->discount_percent;
            $product->currency               = $request->currency;
            $product->save();
        }


        return redirect('manage-product')->with('message', 'Product Updated Successfully!!');
    }



    public function edit_spec($id)
    {
        $product         = Product::find($id);
        $spec = Specifications::where('product_id', $id)->first();
        $heading  = Heading::all();
        $specification = DB::table('specifications')
            ->join('heading', 'specifications.heading', '=', 'heading.heading')
            ->select('specifications.*', 'heading.heading')
            ->where('product_id', '=', $product->id)
            ->get();
        // return $specification;
        // exit();
        return view('Admin.Product.edit_spec', [
            'product'         => $product,
            'heading' => $heading,
            'specification'  => $specification,
            'spec' => $spec
        ]);
    }

    public function update_spec(Request $request, $id)
    {

        if ($request->ajax()) {
            $id = Specifications::find($request->specification_id);
            $id->specification = $request->product_specification;
            $id->save();
        } else {
            return "hlo";
        }
        return $request->all();


        return "hello";





        //        return $request->all();
        //        exit();
        $ids = $request->spe_id;
        $specs = $request->product_specification;
        $totalSpec = count($request->product_specification) - 1;

        for ($i = 0; $i <= $totalSpec; $i++) {
            $spec = Specifications::where('id', $ids[$i])->first();
            $spec->specification = $specs[$i];
            $spec->save();
        }
        return redirect()->back()->with('message', 'Specification Updated Successfully!!');

        // $specification   = Specifications::find($request->spe_id);
        // $specification->specification =$request->input('product_specification');
        // $specification->save();
    }


    public function add_spec($id)
    {



        $product         = Product::find($id);


        // $spec = Specifications::where('product_id',$id)->get();


        // $m = Heading::all();
        // $c = count($m)-1;

        $heading  = Heading::all();

        // $specification = DB::table('specifications')
        //     ->join('heading', 'specifications.heading', '=', 'heading.heading')
        //     ->select('specifications.*', 'heading.heading')
        //     ->where('product_id','=',$product->id)
        //     ->get();


        //     $headings = DB::table('heading')
        //     ->join('specifications', 'specifications.heading', '=', 'heading.heading')

        //     ->where('heading.heading','!=','specifications.heading')
        //     ->where('specifications.product_id','=',$product->id)

        //     ->select('heading.*', 'specifications.heading')
        //     ->get();





        // return $specification;
        // exit();
        return view('Admin.Product.add_spec', [
            'product'         => $product,

            // 'specification'  => $specification,
            // 'spec' => $spec,
            'heading' => $heading
        ]);
    }


    public function add_spec_process(Request $request)
    {



        //   $ids= $request->spe_id;
        //     $specs = $request->product_specification;
        //     $totalSpec = count($request->product_specification)-1;

        //     for($i=0;$i<=$totalSpec;$i++){
        //       $spec = Specifications:: where('id',$ids[$i])->first();
        //       $spec->specification = $specs[$i];
        //       $spec->save();

        // }

        // $specification   = Specifications::find($request->spe_id);
        // $specification->specification =$request->input('product_specification');
        // $specification->save();

        // return $request->all();
        $spe   = new Specifications();
        $spe->heading = $request->heading;
        $spe->specification = $request->specification;
        $spe->product_id  = $request->product_id;
        $spe->save();
        return redirect()->back();



        return redirect('manage-product')->with('message', 'Specification updated successfully!!');
    }


    public function product_details($id)
    {
        $product       = Product::find($id);
        $colorsize     = $product->color_size;
        $productimage  = $product->productImage;
        $specification  = Specifications::where('product_id', '=', $product->id)->get();
        // return $colorsize;
        // exit();
        return view('Admin.Product.product_details', [
            'product'      => $product,
            'colorsize'    => $colorsize,
            'productimage' => $productimage,
            'specification' => $specification
        ]);
    }

    public function delete_spcification($id)
    {
        $spec = Specifications::find($id);
        // $spec->specification = null;
        $spec->delete();
        return redirect()->back();
    }
}
