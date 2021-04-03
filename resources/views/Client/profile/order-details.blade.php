@extends('Client.master')

@section('home-content')
    <section class="contact order-list">
        <div class="container page-bgc">
            <div class="card">
                <div class="card-header">
                    Invoice No
                    <strong>{{$order->id}}</strong>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">Billed to:</h6>
                            <div>
                                <strong>{{Session::get('client_name')}}</strong>
                            </div>

                            <div>Bashundhara D Block,</div>
                            <div>DHAKA, BANGLADESH</div>
                            <div>{{Session::get('client_email')}}</div>
                            <div>{{Session::get('client_contact_no')}}</div>
                        </div>





                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>

                                <th class="right">Unit Cost</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                                <th class="right">Discount</th>
                                <th class="right">After Discount</th>
                                <th>Delivery Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @php($total=0)
                            @php($totalDiscount=0)
                            @foreach($invoices as $invoice)
                            <tr>
                                <td class="center">{{$i++}}</td>
                                <td class="left strong">{{$invoice->product_name}}</td>

                                <td class="right">{{$invoice->product_unit_price}}</td>
                                <td class="center">{{$invoice->product_quantity}}</td>
                                <td class="right">{{$invoice->unit_x_quantity}}</td>
                                <td class="right">{{$invoice->invoice_discount}}</td>
                                <input type="hidden" value="{{$totalDiscount = $totalDiscount + $invoice->invoice_discount}}">
                                <td class="right">{{$invoice->invoice_after_discount}}</td>

                                <td class="right">
                                    @if($invoice->status==1 || $invoice->status==4)
                                        {{'Pending'}}
                                    @elseif($invoice->status==2)
                                        {{'Shipment On The Way'}}
                                    @elseif($invoice->status==3)
                                        {{'Cancelled'}}
                                    @elseif($invoice->status==5)
                                        {{'Delivered'}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">

                        </div>

                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">৳{{$order->total_cost}}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Discount</strong>
                                    </td>
                                    <td class="right">৳{{$totalDiscount}}</td>
                                </tr>

                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>৳{{$order->total_cost}}</strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--</div>-->
    </section>
@endsection
