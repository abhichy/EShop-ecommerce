@extends('Vendor.vendor_master')
@section('vendor-home')
    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Vendor</li>
                <li class="breadcrumb-item active">Brands</li>
            </ol>
            <!-- /Breadcrumbs-->
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header bg-white">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add_brandModal">
                        Add New
                    </button>
                    <span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                            <thead class="">
                            <tr>
                                <th style="width: 20px;">No.</th>
                                <th style="width: 300px;">Name</th>
                                <th style="width: 20px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($vendor_brand as $v_brand)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$v_brand->brand_name}}</td>

                                    <td>
                                        <a
                                            href="{{route('vendor-edit-brand',['id' => $v_brand->id])}}"
                                            class="btn btn-sm btn-warning border-0" data-toggle="modal"  style="border-radius: 12px;"
                                            onclick="edit_BrandModal('', '')">

                                            <i class="fas fa-edit" ></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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


    <!-- Add Brand Modal -->
    <div class="modal fade" id="add_brandModal" tabindex="-1" role="dialog" aria-labelledby="add_brandModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0 rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('vendor-save-brand')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" placeholder="Enter Brand Name" id="brand_name" name="brand_name">
                                <input class="form-control" type="hidden" placeholder="Enter Brand Name" id="" name="vendor_id" value="{{Session::get('vendorid')}}">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="type" class="btn btn-success">Save Changes</button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /Add Brand Modal -->
    <!-- Edit Brand Modal -->
    <div class="modal fade" id="edit_brandModal" tabindex="-1" role="dialog" aria-labelledby="edit_brandModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0 rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Brand Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" value="" id="brand_id_edit" name="brand_id">
                                <input class="form-control" type="text" placeholder="Edit Brand Name" value="" id="brand_name_edit" name="brand_name">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="type" class="btn btn-success">Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- /Edit Brand Modal -->

    @include('Vendor.Endgame.endgame')

    <script>

        //    function showProductDetail(product){

        //     $('#myModal').on('shown.bs.modal', function () {
        //     $('#myInput').trigger('focus')
        //     })
        //     Clearing Previous Data
        //     $('#product-detail').html('');
        //     console.log(product);
        //     $('#productDetailModal').modal('show');

        //    }

        function edit_BrandModal(brand_name, brand_id){
            //console.log(brand_name);
            $('#brand_id_edit').val(brand_id);
            $('#brand_name_edit').val(brand_name);
            $('#edit_brandModal').modal('show');
        }


    </script>




@endsection
