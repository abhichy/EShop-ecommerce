@extends('Admin.admin_master')
@section('admin-home')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Icon Cards-->
             {{-- <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">26 New Messages!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">11 New Tasks!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">123 New Orders!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-life-ring"></i>
                            </div>
                            <div class="mr-5">13 New Tickets!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
             </div>  --}}
            <!-- /Icon Cards-->
            <!-- DataTables Example -->
            {{--<div class="card mb-12">
                <div class="card-header bg-white">
                    <i class="fas fa-table"></i>
                    All Orders</div>
                <h2 style="color: red" align="center"></h2>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                            <thead class="">
                            <tr>
                                <th style="width: 20px;">No.</th>
                                <th style="width: 300px;">Order ID</th>
                                <th style="width: 300px;">Vendor Name</th>
                                <th style="width: 300px;">Vendor Contact No</th>
                                <th style="width: 25px;">Product name</th>
                                <th style="width: 20px;">Quantity</th>
                                <th style="width: 20px;">Price</th>
                                <th style="width: 20px;">Status</th>
                                <th style="width: 20px;">Action</th>
                            </tr>
                            </thead>
                            @php($i = 1)
                            @foreach ($orders as $v_order)
                                <tbody>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$v_order->order_id}}</td>
                                    <td>{{$v_order->vendor_name}}</td>
                                    <td>{{$v_order->phone}}</td>
                                    <td>{{$v_order->product_name}}</td>
                                    <td>{{$v_order->product_quantity}}</td>
                                    <td>{{$v_order->product_unit_price}}</td>

                                    @if($v_order->status==1)
                                        <td><span style="color:blue">Pending</span></td>
                                    @elseif($v_order->status==2)
                                        <td><span style="color:orange">Processing</span></td>
                                    @elseif($v_order->status==3)
                                        <td><span style="color:red">Cancelled</span></td>
                                    @elseif($v_order->status==4)
                                        <td><span style="color:green">Accepted</span></td>
                                    @elseif($v_order->status==5)
                                        <td><span style="color:green">Delivered</span></td>
                                    @endif
                                    <td>

                                        @if($v_order->status==1)
                                        --}}{{-- <a
                                            href=""
                                            class="btn btn-sm btn-info border-0" style="border-radius: 12px; margin-bottom:10px;  ">
                                            Details
                                        </a> --}}{{--
                                        <a
                                            href="{{route('admin-order-accept',['id' => $v_order->id])}}"
                                            class="btn btn-sm btn-info border-0" style="border-radius: 12px; margin-bottom:10px; ">
                                            Accept
                                        </a>
                                        --}}{{--<a
                                            href="{{route('admin-delete-single-order',['id' => $v_order->id])}}"
                                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                                            Delete
                                        </a>--}}{{--
                                            @endif
                                    </td>

                                </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted"></div>
            </div>--}}


            <section class="contact order-list">
                <div class="container page-bgc">
                    <div class="card">
                        <div class="card-header">
                            Invoice No
                            @foreach($clientDetails as $client)
                            <strong>{{$client->id}}</strong>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-3">Billed To:</h6>
                                    <div>
                                        <strong>{{$client->full_name}}</strong>

                                    </div>

                                    <div>{{$client->present_address}}</div>
                                    <div>{{$client->email}}</div>
                                    <div>{{$client->contact_no}}</div>

                                </div>

                                <div class="col-sm-6">
                                    <h6 class="mb-3"></h6>
                                    <div>
                                        <strong>{{$client->first_name}} {{$client->last_name}}</strong>
                                    </div>

                                    <div>{{$client->address}}</div>
                                    <div>{{$client->email}}</div>
                                    <div>{{$client->phone_number}}</div>
                                </div>
                                @endforeach





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
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php($i=1)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="center">{{$i++}}</td>
                                            <td class="left strong">{{$order->product_name}}</td>
                                            <td class="right">{{$order->product_unit_price}}</td>
                                            <td class="center">{{$order->product_quantity}}</td>
                                            <td class="right">{{$order->unit_x_quantity}}</td>
                                            <td class="right">{{$order->invoice_discount}}</td>
                                            <td class="right">{{$order->invoice_after_discount}}</td>
                                            <td class="right">
                                                @if($order->status==1)
                                                    {{'Pending'}}
                                                @elseif($order->status==4)
                                                    {{'Pending(Vendor)'}}
                                                @elseif($order->status==2)
                                                    {{'Shipment On The Way'}}
                                                @elseif($order->status==3)
                                                    {{'Cancelled'}}
                                                @elseif($order->status==5)
                                                    {{'Delivered'}}
                                                @endif
                                            </td>
                                            <td >
                                                @if($order->status==1)
                                                <a
                                                    href="{{route('admin-order-accept',['id' => $order->id])}}"
                                                    class="btn btn-info ">
                                                    Accept
                                                </a>
                                                @endif
                                                @if($order->status!=3)
                                                <a
                                                    href="{{route('admin-cancel-order',['id' => $order->id])}}"
                                                    class="btn btn-danger ">
                                                    Cancel
                                                </a>
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
                                        @foreach($clientDetails as $client)
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="right">৳ {{$client->sub_total}}</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Discount (%)</strong>
                                            </td>
                                            <td class="right">৳ {{$client->discount}}</td>
                                        </tr>

                                        <tr>
                                            <td class="left">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="right">
                                                <strong>৳ {{$client->total_cost}}</strong>
                                            </td>
                                        </tr>
                                         @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!--</div>-->
            </section>






        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Product Detail Modal -->
    <!-- Modal -->
    <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Product Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="product-detail">

                    <h2 id="product-name"></h2>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- / Product Detail Modal -->


    <script>

        function showProductDetail(product){

            // $('#myModal').on('shown.bs.modal', function () {
            // $('#myInput').trigger('focus')
            // })
            // Clearing Previous Data
            //$('#product-detail').html('');
            //console.log(product);
            //$('#productDetailModal').modal('show');

        }


    </script>




@endsection
