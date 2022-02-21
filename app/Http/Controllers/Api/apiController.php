<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Category\Category;
use App\model\Vendor\Brand;

class apiController extends Controller
{

	public function getcategories($id)
	{
		$root=$_GET["cat_id"];
		// $category   = productcategory::find($id);
		$productcategory = Category::where('root_id',$id)->get();
		$res["cat_data"]=$productcategory;
	   // $res["status"]=1;
	   // $res["msg"]="hello...";
	   echo json_encode($res);
	}


	public function getbrands($id)
	{
		    $root=$_GET["vendor_id"];
	 		// $category   = productcategory::find($id);
     	    $brand = Brand::where('vendor_id',$id)->get();
 		    $res["vendor_data"]=$brand;
            // $res["status"]=1;
            // $res["msg"]="hello...";
            echo json_encode($res);
	}


	// public function getcategorywisecategory($id)
	// {
	// 	    $root=$_GET["cat_id"];
	// 		$category   = productcategory::find($id);
	// 		$categories = productcategory::where('root_id',$id)->get();
	//         $res["cat_data"]=$categories;
 //            // $res["status"]=1;
 //            // $res["msg"]="hello...";
 //            echo json_encode($res);
	// }

}
