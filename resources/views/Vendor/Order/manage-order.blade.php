@extends('Vendor.vendor_master')
@section('vendor-home')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Icon Cards-->
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
            <div class="row">
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

            </div>
            <!-- /Icon Cards-->
            <!-- DataTables Example -->
            <div class="card mb-12">
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
                                <th style="width: 300px;">Customer Name</th>
                                <th style="width: 300px;">Order ID</th>
                                <th style="width: 25px;">product name</th>
                                <th style="width: 20px;">Quantity</th>
                                <th style="width: 20px;">Price</th>
                                <th style="width: 20px;">Date</th>
                                <th style="width: 20px;">Delivery location</th>
                                <th style="width: 20px;">Status</th>
                                <th style="width: 20px;">Action</th>
                            </tr>
                            </thead>
                            @php($i = 1)
                            @foreach ($orders as $v_order)
                                <tbody>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$v_order->full_name}}</td>
                                    <td>{{$v_order->order_id}}</td>
                                    <td>{{$v_order->product_name}}</td>
                                    <td>{{$v_order->product_quantity}}</td>
                                    <td>{{$v_order->product_unit_price}}</td>

                                    <td>{{$v_order->created_at}}</td>
                                    <td>{{$v_order->address}}</td>
                                    @if($v_order->status == 4)
                                        <td><span style="color:blue">Pending</td>
                                    @elseif($v_order->status == 2)
                                        <td><span style="color:orange"><b>Processing</b></span></td>
                                    @elseif($v_order->status == 3)
                                        <td><span style="color:red">Cancelled</span></td>
                                    @elseif($v_order->status==5)
                                        <td><span style="color:green">Delivered</span></td>
                                    @endif
                                    <td>
                                        {{-- <a
                                            href=""
                                            class="btn btn-sm btn-info border-0" style="border-radius: 12px; margin-bottom:10px;  ">
                                            Details
                                        </a> --}}
                                        @if($v_order->status==4)
                                        <a
                                            href="{{route('vendor-order-accept',['id' => $v_order->id])}}"
                                            class="btn btn-sm btn-info border-0" style="border-radius: 12px; margin-bottom:10px; ">
                                            accept
                                        </a>
                                        @endif
                                        @if($v_order->status!=3 && $v_order->status!=5)
                                        <a
                                            href="{{route('vendor-order-cancel',['id' => $v_order->id])}}"
                                            class="btn btn-sm btn-danger border-0" style="border-radius: 12px;">
                                            cancel
                                        </a>
                                        @endif
                                        <i class="fas fa-edit"></i>
                                    </td>

                                </tr>

                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>

                <form action="{{route('pdf-upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <h3>Upload PDF</h3>
                        <div class="form-group mt-3">
                            <input required type="file" name="pdf">

                            <select required name="order_id">
                                <option>Select Order ID</option>
                                @foreach($orderSelect as $order)
                                    <option value="{{ $order->order_id }}">{{ $order->order_id }}</option>
                                @endforeach
                            </select>

                            <input type="hidden" value="{{Session::get('vendorid')}}" name="vendor_id">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </div>
                </form>

                <div class="card-footer small text-muted"></div>
            </div>


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
