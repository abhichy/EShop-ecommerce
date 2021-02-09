<?php

namespace App\model\Vendor;

use Illuminate\Database\Eloquent\Model;
use Mail;
use Auth;
use App\notifications\Vendornotify;
use Session;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class VendorAuth extends Model
{
    use Notifiable;

    protected $fillable = ['vendor_name','password','email','phone','location','email_verification','activity','nid'];
    // Database relationship--------
    public function vendor()
    {
        return $this->hasMany('App\model\Vendor\VendorAuth');
    }


    // for saved vendor --------
    public static function save_vendor_info($request)
    {
        $vendor = new VendorAuth();
        $vendor->vendor_name        = $request->vendor_name;
        $vendor->email              = $request->email;
        $vendor->phone              = $request->phone;
        $vendor->password           = bcrypt($request->password);
        $vendor->location           = $request->location;
        // $vendor->email_verification = $request->email_verification;
        $vendor->nid                = $request->nid;
        $vendor->activity           = $request->activity;
        $vendor->save();
        Session::put('vendorid',$vendor->id);
        Session::put('vendorname',$vendor->vendor_name);

        // $data = $vendor->toArray();
        // Mail::send('Admin.Emails.thanksmail',$data,function($message) use ($data){
        //     $message->to($data['email']);
        //     $message->subject('Thank you');
        // });

    }
}
