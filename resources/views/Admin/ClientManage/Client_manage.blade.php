@extends('Admin.admin_master')
@section('admin-home')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Icon Cards-->
            <div class="row">

            </div>
            <!-- /Icon Cards-->
            <!-- DataTables Example -->
            <h3 style="color: red" align="center">{{ Session::get('message') }}</h3>
            <div class="card mb-3">
                <div class="card-header bg-white">
                    <i class="fas fa-table"></i>
                    All Clients
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="">
                                <tr>
                                    <th style="width: 20px;">No.</th>
                                    <th style="width: 300px;">Name</th>
                                    <th style="width: 20px;">Email</th>
                                    <th style="width: 20px;">Phone</th>
                                    <th style="width: 20px;">Location</th>

                                    <th style="width: 20px;">Status</th>
                                    <th style="width: 20px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                    @foreach ($client as $v_client)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $v_client->full_name }}</td>
                                            <td>{{ $v_client->email }}</td>
                                            <td>{{ $v_client->contact_no }}</td>
                                            <td>{{ $v_client->present_address }}</td>

                                            @if ($v_client->status == 1)
                                                <td style="color:green">Active</td>
                                            @else
                                                <td style="color:red">Inactive</td>
                                            @endif


                                            <td>
                                                {{-- <a href=""
                                                    class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                                                    Details
                                                </a> --}}
                                                @if ($v_client->status == 0)
                                                    <a href="{{ route('client-active', ['id' => $v_client->id]) }}"><b
                                                            style="color:green">active</b></a> ||
                                                @else
                                                    <a href="{{ route('client-deactive', ['id' => $v_client->id]) }}"><b
                                                            style="color:red">inactive</b></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Product Details</h5>
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
            function showProductDetail(product) {

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
