<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\model\Invoice\Invoice;
use App\model\Product\Product;
use Illuminate\Http\Request;
use Cart;
use App\model\Client\Order;
use App\model\Client\payment;
use Session;
use Mail;
use DB;
class OrderController extends Controller
{
    public function confirm_order(Request $request)
    {
        // $ordertotal = Cart::priceTotal();

        if (Session::get('totalAfterDiscount')){

            $order = new Order();
            $order->first_name   = $request->name;
            $order->last_name    = $request->lastname;
            $order->email        = $request->email;
            $order->status       = $request->status;
            $order->address      = $request->address;
            $order->phone_number = $request->phonenumber;
            $order->client_id    = Session::get('client_id');
            $order->sub_total    = (float)(Session::get('discount'))+(float)(Session::get('totalAfterDiscount'));
            $order->discount    = Session::get('discount');
            $order->total_cost   = Session::get('totalAfterDiscount');


            $order->save();

        }

        else{
            $order = new Order();
            $order->first_name   = $request->name;
            $order->last_name    = $request->lastname;
            $order->email        = $request->email;
            $order->status       = $request->status;
            $order->address      = $request->address;
            $order->phone_number = $request->phonenumber;
            $order->client_id    = Session::get('client_id');
            $order->sub_total    = Session::get('ordertotal');
            $order->discount    = 0;
            $order->total_cost   = Session::get('ordertotal');


            $order->save();
        }

        /*$order = new Order();
        $order->first_name   = $request->name;
        $order->last_name    = $request->lastname;
        $order->email        = $request->email;
        $order->status       = $request->status;
        $order->address      = $request->address;
        $order->phone_number = $request->phonenumber;
        $order->post_code    = $request->postcode;
        $order->client_id    = Session::get('client_id');
        $order->total_cost   = Session::get('totalAfterDiscount');*/


        //$order->save();

        $cartproduct = Cart::content();
        foreach ($cartproduct as $v_cartProduct) {
            $pInfo = Product::find($v_cartProduct->id);


            DB::table("products")->where('id', $pInfo->id)->increment('popularity');


            $invoice = new Invoice();
            $invoice->vendor_id  = $pInfo->vendor->id;
            $invoice->order_id   = $order->id;
            $invoice->client_id  = Session::get('client_id');
            $invoice->product_id = $v_cartProduct->id;
            $invoice->product_unit_price = $v_cartProduct->price;
            $invoice->product_quantity   = $v_cartProduct->qty;
            $unit_x_quantity = $v_cartProduct->price * $v_cartProduct->qty;
            $invoice->unit_x_quantity   = $unit_x_quantity;

            $total_discount = $pInfo->discount*$v_cartProduct->qty;
            $invoice->invoice_discount   = $total_discount;
            $invoice->invoice_after_discount   = $unit_x_quantity - $total_discount;
            $invoice->save();
        }
        $payment = new payment();
        $payment->order_id = $order->id;
        $payment->payment_type = $request->payment;
        $payment->client_id   = Session::get('client_id');
        $payment->card_name   = $request->cardname;
        $payment->card_number = $request->cardno;
        $payment->expireDate  = $request->expireDate;

        $payment->comment = $request->comment;
        $payment->save();
        Cart::destroy();
        Session::forget('discount');
        Session::forget('totalAfterDiscount');


        // $data = $order->toArray();
        //  Mail::send('Client.Emails.order_create',$data,function($message) use ($data){
        //      $message->to($data['email']);
        //      $message->subject('order success email');
        //  });
        // return "success!!";
        // return $request->all();
        //    return redirect('/');
    }
}
