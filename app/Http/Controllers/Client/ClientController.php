<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use App\model\Category\Category;
use App\model\Client\ContactUs;
use App\model\Client\Order;
use App\model\Product\Product;
use App\model\Vendor\Brand;
use App\model\ProductImage\ProductImage;
use App\ProductReview;
use Illuminate\Http\Request;
use Cart;
use Session;
use DB;
use Image;

class ClientController extends Controller
{
    public function index()
    {
        // $categories = Category::where('root_id',0)->get();
        // $products = Product::take(8)->orderBy('id','desc')->get();
        $categorys = Category::with('product')->where('root_id', 0)->get();
        $carouselProducts = Product::where('status',1)->take(6)->get();
        $carouselProducts2 = Product::where('status',1)->take(6)->get();
        $carouselProducts3 = Product::where('status',1)->take(6)->get();

        return view('Client.Home.home')->with([
            // 'categories'=>$categories,
            // 'products'=>$products,
            'categorys' => $categorys,
            'carouselProducts' => $carouselProducts,
            'carouselProducts2' => $carouselProducts2,
            'carouselProducts3' => $carouselProducts3,

        ]);


    }

    public function search(Request $request)
    {
        $data = array();
        if ($request->get('query')) {
            $query = $request->get('query');
            $result = DB::table('products')
                ->where('product_name', 'LIKE', "%{$query}%")
                ->get();


            foreach ($result as $val) {
                $ara=array();
                $ara["id"]=$val->id;
                $ara["value"]=$val->product_name;
                array_push($data, $ara);
            }


            /*$output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
             $output .= '
             <li><a href="" type="hidden">'.$row->product_name.'</a></li>
             ';
            }
            $output .= '</ul>';
            echo $output;*/
        }
        echo json_encode($data);


    }

    public function price_filter()
    {

        //print_r($_GET["min"]);
        $max = $_GET["max"];
        $min = $_GET["min"];
        $id_list = "";
        if (isset($_GET["filter"])) {

            $id_list = array();
            //$filter_cate=$_GET["filter"];
            $filter_cate = json_decode(stripslashes($_GET['filter']));

            foreach ($filter_cate as $item) {
                $id_list[] = $item[0];
            }
            //$id_list=$id_list."-0903";
            //$filter=$filter->whereIn('id', [$id_list]);
        }
        DB::enableQueryLog();
        $filter = DB::table('products')
            ->whereBetween('product_price', [$min, $max])
            ->where(function ($filter) use ($id_list) {
                if (count($id_list) > 0)
                    $filter->whereIn('category_id', $id_list);
            })
            ->get();
        $query = DB::getQueryLog();
        //echo $id_list;
        //print_r($query);
        // $catid  = Category::get(['id']);
        // $filter = Product::where('category_id',$catid)->whereBetween('product_price', [$min, $max])->get();
        return view('Client.Productlist.product_list', [
            'filter' => $filter
        ]);
    }


    public function category($id)
    {

        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::with('category')->where('category_id', $id)->get();
        return view('Client.category.category')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
        ]);
    }


    public function subCategory($id)
    {

        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::with('category')->where('subcategory_id', $id)->get();
        return view('Client.category.sub-category')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function brandProducts($id)
    {

        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::with('brand')->where('brand_id', $id)->get();
        return view('Client.brand-products.products')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function productDetails($id, $category_id)
    {

        $products = Product::with('category')
            ->where('category_id', $category_id)
            ->where('id', '!=', $id)
            ->take(4)->get();

        $product = Product::find($id);

        $productImages = ProductImage::where('product_id', $id)->get();
        //return $productImages;

        $bestProducts = Product::take(3)->orderBy('popularity', 'desc')->get();

        $reviews = DB::table('product_reviews')
            ->join('products', 'product_reviews.product_id', '=', 'products.id')
            ->join('clients', 'clients.id', '=', 'product_reviews.client_id')
            ->select('product_reviews.*', 'clients.full_name')
            ->where('product_reviews.product_id', $product->id)
            ->get();

        return view('Client.product.details.product')->with([
            'product' => $product,
            'products' => $products,
            'reviews' => $reviews,
            'bestProducts' => $bestProducts,
            'productImages' => $productImages,
        ]);
    }


// brand wise product filter -----------
    public function brand_price_filter()
    {
        $max = $_GET["max"];
        $min = $_GET["min"];
        $id_list = "";
        if (isset($_GET["filter"])) {

            $id_list = array();
            //$filter_cate=$_GET["filter"];
            $filter_cate = json_decode(stripslashes($_GET['filter']));

            foreach ($filter_cate as $item) {
                $id_list[] = $item[0];
            }
            //$id_list=$id_list."-0903";
            //$filter=$filter->whereIn('id', [$id_list]);
        }
        DB::enableQueryLog();
        $filter = DB::table('products')
            ->whereBetween('product_price', [$min, $max])
            ->where(function ($filter) use ($id_list) {
                if (count($id_list) > 0)
                    $filter->whereIn('brand_id', $id_list);
            })
            ->get();
        $query = DB::getQueryLog();
        //echo $id_list;
        //print_r($query);
        // $catid  = Category::get(['id']);
        // $filter = Product::where('category_id',$catid)->whereBetween('product_price', [$min, $max])->get();
        return view('Client.Productlist.brand_product_list', [
            'filter' => $filter
        ]);
    }


// end brand wise product filter............

    public function about()
    {
        return view('Client.about.about');
    }


    public function contactUs()
    {
        return view('Client.contact-us.contact');
    }

    public function contactSubmit(Request $request)
    {

        $contact = new ContactUs();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return back()->with('message', 'Message send successfully');

    }

    public function newsFeed()
    {
        return view('Client.news-feed.feed');
    }

    public function editProfile()
    {
        return view('Client.profile.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        Client::updateProfile($request);
        return redirect('/client/profile')->with('message', 'Profile Updated Successfully!!');
    }

    public function orderList()
    {
        $uid = Session::get('client_id');
        $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.client_id')
            ->where('orders.client_id', $uid)
            ->select('clients.*', 'orders.*')
            ->orderBy('orders.id', 'desc')
            ->get();

        $pending = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->where('invoices.client_id', $uid)
            ->where('invoices.status', 1)
            ->orWhere('invoices.client_id', $uid)
            ->where('invoices.status', 4)
            ->select('clients.*', 'invoices.*')
            ->get();

        $pendingTotal = $pending->count();

        $processing = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->where('invoices.client_id', $uid)
            ->where('invoices.status', 2)
            ->select('clients.*', 'invoices.*')
            ->get();

        $processingTotal = $processing->count();


        $cancelled = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->where('invoices.client_id', $uid)
            ->where('invoices.status', 3)
            ->select('clients.*', 'invoices.*')
            ->get();

        $cancelledTotal = $cancelled->count();

        $delivered = DB::table('invoices')
            ->join('clients', 'clients.id', '=', 'invoices.client_id')
            ->where('invoices.client_id', $uid)
            ->where('invoices.status', 5)
            ->select('clients.*', 'invoices.*')
            ->get();

        $deliveredTotal = $delivered->count();

        return view('Client.profile.order-list', [
            'orders' => $orders,
            'pendingTotal' => $pendingTotal,
            'processingTotal' => $processingTotal,
            'cancelledTotal' => $cancelledTotal,
            'deliveredTotal' => $deliveredTotal,
        ]);

    }

    public function orderList2($id)
    {
        $uid = Session::get('client_id');
        /*$invoices = DB::table('invoices')
            ->join('orders','invoices.order_id','=','orders.id')
            ->join('products','invoices.product_id','=','products.id')
            ->select('invoices.*','products.product_name','products.product_description')
            ->where('invoices.status',$id)
            ->where('orders.client_id',$uid)
            ->get();*/


        if ($id == 1 || $id == 4) {
            $invoices = DB::table('invoices')
                ->join('orders', 'invoices.order_id', '=', 'orders.id')
                ->join('products', 'invoices.product_id', '=', 'products.id')
                ->select('invoices.*', 'products.product_name', 'products.product_description')
                ->where('invoices.status', 1)
                ->where('orders.client_id', $uid)
                ->orWhere('invoices.status', 4)
                ->where('orders.client_id', $uid)
                ->get();
        } else {
            $invoices = DB::table('invoices')
                ->join('orders', 'invoices.order_id', '=', 'orders.id')
                ->join('products', 'invoices.product_id', '=', 'products.id')
                ->select('invoices.*', 'products.product_name', 'products.product_description')
                ->where('invoices.status', $id)
                ->where('orders.client_id', $uid)
                ->get();
        }


        return view('Client.profile.order-list2', [
            'order' => Order::find($id),
            'invoices' => $invoices
        ]);
    }

    public function orderDetails($id)
    {
        $invoices = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->select('invoices.*', 'products.product_name', 'products.product_description')
            ->where('invoices.order_id', $id)
            ->get();

        return view('Client.profile.order-details', [
            'order' => Order::find($id),
            'invoices' => $invoices
        ]);
    }

    public function productReview(Request $request)
    {

        $this->validate($request, [
            'description' => 'required',
            'rating' => 'required'
        ]);


        //$product = product::find($request->product_id);
        $product = new ProductReview();
        $product->product_id = $request->product_id;
        $product->client_id = $request->client_id;
        $product->description = $request->description;
        $product->rating = $request->rating;
        $product->save();
        return back()->with('message', 'Review submitted successfully');

    }


}
