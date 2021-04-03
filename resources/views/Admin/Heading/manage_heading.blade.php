@extends('Admin.admin_master')
@section('admin-home')
    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Heading</li>
            </ol>
            <!-- /Breadcrumbs-->
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header bg-white">
                    <!-- Button trigger modal -->
                    <a  href="{{route('add-heading')}}" type="button" class="btn btn-sm btn-success" >
                        Add New
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                            <thead class="">
                            <tr>
                                <th style="width: 20px;">No.</th>
                                <th style="width: 300px;">Heading</th>
                                <th style="width: 300px;">Serial</th>
                                <th style="width: 20px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($heading as $v_heading)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$v_heading->heading}}</td>
                                    <td>{{$v_heading->serial}}</td>

                                    <td>
                                     <a href="{{route('edit-heading',['id' => $v_heading->id])}}">Edit</a>
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
    <!-- /Edit Brand Modal -->

    @include('Admin.endgame.endgame')

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
