@extends('Admin.admin_master')
@section('admin-home')


<body id="page-top">
    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Types</li>
        </ol>
        <!-- /Breadcrumbs-->
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header bg-white">
          <a href="{{route('add-type')}}"
               class="btn btn-sm btn-outline-success">Add new
            </a>
          </div>
          <h3 style="color:red" align="center">{{Session::get('message')}}</h3>
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
                 @foreach($types as $v_type)
                  <tr>
                  <td>{{$i++}}</td>
                  <td>{{$v_type->type_name}}</td>
                    <td>
                        <a
                    href="{{route('type-details',['id' => $v_type->id])}}"
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            Details
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
