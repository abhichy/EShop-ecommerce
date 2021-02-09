@extends('Admin.admin_master')
@section('admin-home')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Icon Cards-->
            <div class="row">

            </div>
            <!-- /Icon Cards-->
            <!-- DataTables Example -->
            <h3 style="color: red" align="center"></h3>
            <div class="card mb-3" >
                <div class="card-header bg-white">
                    <i class="fas fa-table"></i>
                    All Orders</div>

                     <div class="form-row">
                         {{-- <div class="col-md-3"></div>
                        <input type="date" id="date" name="date" class="form-control" >
                        </div>
                        <div class="col-md-3"></div>
                        <input type="date" id="exdate" name="expected_date" class="form-control" >
                        </div>
                         <div class="col-md-3" style="margin-top="20%">
                        <select required class="form-control form-control-sm" id="pc" name="status">
                            <option value="0">select</option>
                                <option value="1">pending</option>
                                <option value="2">processing</option>
                                <option value="3">cancelled</option>
                                <option value="4">delivered</option>
                             </select>
                        <div class="col-md-12 ">
                        <div class="row">
                         <button type="button" onclick="adminOrderFilter(this)"class="btn btn-primary">submit</button>
                        </div>

                        </div>
                        </div> --}}



                <div class="card-body" id="productData">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                            <thead class="">
                            <tr>
                                <th >SL</th>
                                <th >Order ID</th>
                                <th >Customer Name</th>
                                <th >Total Cost</th>
                                <th >Contact No</th>
                                <th >Shipping Address</th>
                                <th>Status</th>
                                {{-- <th style="width: 20px;">Price</th> --}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($orders as $v_orders)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$v_orders->id}}</td>
                                    <td>{{$v_orders->full_name}}</td>
                                    <td>{{$v_orders->total_cost}}</td>
                                    <td>{{$v_orders->contact_no}}</td>
                                    <td>{{$v_orders->address}}</td>
                                    @if($v_orders->status == 1)
                                        <td><span style="color:black"><b>Pending</b></span></td>
                                    @elseif($v_orders->status == 3)
                                        <td><span style="color:red">Cancelled</span></td>
                                    @elseif($v_orders->status == 2)
                                        <td><span style="color:orange"> Processing</span></td>
                                    @else
                                        <td><span style="color:green">Delivered</span></td>
                                    @endif
                                    <td>
                                        <a href="{{route('admin-manage-order-details',['id'=>$v_orders->id])}}"
                                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                                            Details
                                        </a>
                                        {{--<a
                                            href="{{route('admin-delete-order',['id'=>$v_orders->id])}}"
                                            class="ml-2 btn btn-sm btn-danger border-0" style="border-radius: 12px;">
                                            Delete
                                        </a>--}}

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--<div class="card-footer small text-muted"></div>-->
            </div>
        </div>
    </div>

    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
<script src="{{asset('public/client/assets/js/custom/api.js')}}"></script>
<script src="{{asset('public/admin/js/order_search.js')}}"></script>
@endsection
