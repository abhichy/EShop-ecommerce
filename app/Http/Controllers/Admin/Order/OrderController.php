<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\model\Client\Order;
use App\model\Invoice\Invoice;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{

    public function manageOrder()
    {
        $orders = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->select('orders.*', 'clients.full_name', 'clients.contact_no')
            ->orderBy('id','desc')
            ->get();
        return view('Admin.Orders.manage-orders',[
            'orders'=> $orders
        ]);
    }

    public function orderDetails($id){
        $orders = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->join('vendor_auths', 'invoices.vendor_id', '=', 'vendor_auths.id')
            ->select('invoices.*', 'clients.full_name','products.product_name','vendor_auths.vendor_name','vendor_auths.phone')
            ->where('invoices.order_id',$id)
            ->get();

        $clientDetails = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->select('clients.*','orders.id', 'orders.first_name', 'orders.last_name', 'orders.email', 'orders.address', 'orders.phone_number','orders.sub_total','orders.discount','orders.total_cost')
            ->where('orders.id',$id)
            ->get();

        return view('Admin.Orders.order-details',[
            'orders' => $orders,
            'clientDetails' => $clientDetails,
        ]);
    }

    public function acceptOrder($id){
        
        $invoice = Invoice::find($id);
        $invoice->status = 4;
        $invoice->save();
        return back();
    }

    public function cancelOrder($id){
        
        $invoice = Invoice::find($id);
        $invoice->status = 3;
        $invoice->save();
        return back();
    }

    public function deleteOrder($id){
       
        $orders = Order::find($id);
        $orders->delete();

        $invoice = Invoice::where('order_id',$id);
        $invoice->delete();
        return back();
    }
    
    public function order_search_filter(Request $request)
    {
        // return $request->all();
        // exit();
        // $date="";$status="";$expected_date="";
        // if(!empty($request->get('date'))){
        //     $date   = $request->get('date');
        // }
        // if(!empty($request->get('status'))){
        //     $status = $request->get('status');
        // }
        // if(!empty($request->get('exdate'))){
        //     $expected_date = $request->get('exdate');
        // }
        
        $from = $request->get('date');
        $to =  $request->get('exdate');
        $status = $request->get('status');
        
        $orders = Order::whereBetween('created_at', [$from, $to])->where('status','=',$status)->get();
        
        
        //  $orders = Order::query()
        //     ->where(function ($filter) use ($date,$status) {
        //         if (!empty($date))
        //             $filter->where('created_at', 'LIKE', $date);
        //         if (!empty($expected_date))
        //             $filter->where('created_at', 'LIKE', $expected_date);
        //         if (!empty($status))
        //             $filter->where('status', 'LIKE', $status);
        //     })->get();
            
        // return $orders;
        return view('Admin.Orders.order_result',[
          'orders' => $orders
        ]);
    }

}
