<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\model\Client\Coupon;
use Illuminate\Http\Request;
use Session;

class CouponController extends Controller
{
    /*public function check(Request $request){

        $coupon = Coupon::where('code',$request->code)->first();


        if ($coupon!=null){
            if ($coupon->code == $request->code){
                $t = Session::get('ordertotal');

                $a = str_replace(',','',$t);
                $total = (float)$a;
                $percent = $coupon->percent;
                $discount = ($total * $percent)/100;
                $totalAfterDiscount = $total-$discount;
                Session::put('discount',$discount);
                Session::put('totalAfterDiscount',$totalAfterDiscount);

                return back();
            }
        }

        else{
            return back()->with('message','Invalid coupon or it is expired');
        }





    }*/


    public function check(Request $request){

        $coupon = Coupon::where('code',$request->code)->first();

        $t = Session::get('ordertotal');

        $a = str_replace(',','',$t);
        $total = (float)$a;



        if ($coupon!=null){
            if ($coupon->code == $request->code && $total>=$coupon->min_amount){

                $percent = $coupon->percent;
                $discount = ($total * $percent)/100;
                $totalAfterDiscount = $total-$discount;
                Session::put('discount',$discount);
                Session::put('totalAfterDiscount',$totalAfterDiscount);

                return back();
            }

            elseif ($total<$coupon->min_amount){
                return back()->with('message','Minimum order amount should be at least 600bdt');
            }
        }



        else{
            return back()->with('message','Invalid coupon or it is expired');
        }

    }
}
