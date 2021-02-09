<?php

namespace App\Http\Controllers\Admin\VendorManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Vendor\VendorAuth;
use DB;
use Mail;

class VendorManagementController extends Controller
{
    public function vendor_manage()
    {   $vendor = VendorAuth::orderBy('id','desc')->get();
        return view('Admin.Vendormanage.Vendor_manage',[
            'vendor' => $vendor
        ]);
    }

    // for accept vendor request ---------
    public function accept_request($id)
    {
        $vendor = VendorAuth::find($id);
        $vendor->activity = 1;
        $vendor->save();

        // $data = $vendor->toArray();
        //  Mail::send('Admin.Emails.congratulation',$data,function($message) use ($data){
        //     $message->to($data['email']);
        //     $message->subject('congratulation mail');
        // });
        return redirect()->back()->with('message','Vendor Active Successfully !!!');
    }

    // for cancel vendor request-------------

    public function cancel_request($id)
    {
        $vendor = VendorAuth::find($id);
        $vendor->activity = 0;
        $vendor->save();

        // $data = $vendor->toArray();
        //  Mail::send('Admin.Emails.ignore',$data,function($message) use ($data){
        //      $message->to($data['email']);
        //      $message->subject('Ignore mail');
        //  });
        return redirect()->back()->with('message','Vendor Deactive Successfully !!!');
    }
}
