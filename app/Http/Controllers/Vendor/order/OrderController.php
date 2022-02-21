<?php

namespace App\Http\Controllers\Vendor\order;

use App\Http\Controllers\Controller;
use App\model\Invoice\Invoice;
use Illuminate\Http\Request;
use DB;
use Session;

class OrderController extends Controller
{

    public function manageOrder(){

        $vid = Session::get('vendorid');
        $orders = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->join('vendor_auths', 'invoices.vendor_id', '=', 'vendor_auths.id')
            ->select('invoices.*', 'clients.full_name','products.product_name','orders.address')
            ->where('invoices.vendor_id',"=",$vid)
            ->where('invoices.status',"!=",1)
            ->get();
        // $vid = Session::get('vendorid');
        // $vendor_orders = invoice::where('vendor_id',"=",$vid)->get();

        $orderSelect = Invoice::where('vendor_id',$vid)
            ->select('order_id', DB::raw('count(*) as total'))
            ->groupBy('order_id')
            ->get();

        return view('Vendor.Order.manage-order',[
            'orders' => $orders,
            'orderSelect' => $orderSelect,
            //  'vendor_orders' => $vendor_orders
        ]);

    }


    public function acceptOrder($id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = 2;
        $invoice->save();
        return back();
    }

    public function cancelOrder($id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = 3;
        $invoice->save();
        return back();
    }

    public function uploadPdf(Request $request){

        $request->validate([
            'pdf' => 'required|mimes:pdf,xlx,csv',
            'order_id' => 'required',
        ]);

        $invoices = Invoice::where('order_id',$request->order_id)
            ->where('vendor_id',$request->vendor_id)
            ->get();

        foreach ($invoices as $invoice){


            $pdf     = $request->file('pdf');
            $pdfName = $pdf->getClientOriginalName();
            $directory = 'uploads/';
            //$pdf->move($directory,$pdfName);

            $invoice->pdf            = $directory.$pdfName;
            $invoice->save();

        }

        foreach ($invoices as $invoice){
            $pdf     = $request->file('pdf');
            $pdfName = $pdf->getClientOriginalName();
            $directory = 'uploads/';
            $pdf->move($directory,$pdfName);

            $invoice->pdf             = $directory.$pdfName;
            $invoice->save();
            return back()->with('message','PDF uploaded successfully');
        }


        /*$invoice = Invoice::find($request->id);

        $pdf     = $request->file('pdf');
        $pdfName = $pdf->getClientOriginalName();
        $directory = 'uploads/';
        $pdf->move($directory,$pdfName);

        $invoice->pdf             = $directory.$pdfName;
        $invoice->save();*/



        /*$fileName = time().'.'.$request->pdf->extension();

        $invoice->pdf = $request->pdf->move(public_path('uploads'), $fileName);*/


        return redirect('/vendor-manage-brand')->with('message','PDF Uploaded Successfully');


    }






}
