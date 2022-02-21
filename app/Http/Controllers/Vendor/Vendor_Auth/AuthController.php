<?php

namespace App\Http\Controllers\Vendor\Vendor_Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Vendor\VendorAuth;
use Session;


class AuthController extends Controller
{
    // for security
    public function authcheck()
    {
        $admin = Session::get('vendorid');
        if ($admin == NULL) {
            return redirect('vendor-login')->send();
        }
    }


    public function vendor_login()
    {
        return view('Vendor.Auth.vendor_login');
    }


    // for vendor register----------
    public function vendor_register()
    {
        return view('Vendor.Auth.vendor_register');

    }

    // for vendor new login
    public function vendor_new_login(Request $request)
    {
    $vendor = VendorAuth::where('email', $request->email)->first();
    if ($vendor) {

    if (password_verify($request->password, $vendor->password)) {

    if($vendor->activity == 1){
         Session::put("vendorid",$vendor->id);
         Session::put("vendorname",$vendor->vendor_name);
        //  return redirect("vendor-dashboard");
         return view('Vendor.home.vendor_home');
      }
      else{
        return redirect("/vendor-login")->with("message","You are not accepted yet !!! Please contact with admin");
      }
    }

   else {
   return redirect("/vendor-login")->with("message","Password not valid!!");
       }
    }
   else{
       return redirect("/vendor-login")->with("message","Email not valid!!");
     }

    }
    // for vendor save information ---------------

    public function vendor_save(Request $request)
    {
        VendorAuth::save_vendor_info($request);
        return back()->with('message','Hi there...your account has created successfully..please wait for admin confirmation!!');

    }


    public function vendor_logout()
    {
        Session::forget('vendorname');
        Session::forget('vendorid');
        return redirect('vendor-login')->with('message','Logout Successful !!');
    }


    public function vendor_dashboard()
    {
        $this->authcheck();
        return view('Vendor.home.vendor_home');
    }
}
