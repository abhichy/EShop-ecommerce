@extends('Client.master')

@section('home-content')
    <section class="contact order-list">
        <div class="container page-bgc">
            <div class="card">

                <div class="card-body">


                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>
                                <th>Description</th>

                                <th class="right">Unit Cost</th>
                                <th class="center">Qty</th>
                                <th class="right">Total</th>
                                <th>Delivery Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td class="center">{{$i++}}</td>
                                    <td class="left strong">{{$invoice->product_name}}</td>
                                    <td class="left">{{$invoice->product_description}}</td>

                                    <td class="right">{{$invoice->product_unit_price}}</td>
                                    <td class="center">{{$invoice->product_quantity}}</td>
                                    <td class="right">{{$invoice->product_unit_price}}</td>

                                    <td class="right">
                                        @if($invoice->status==1 || $invoice->status==4)
                                            {{'Pending'}}
                                        @elseif($invoice->status==2)
                                            {{'Processing'}}
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



                    </div>

                </div>
            </div>
        </div>
        <!--</div>-->
    </section>
@endsection
