@extends('Admin.admin_master')
@section('admin-home')


<body id="page-top"> 
   <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Types</li>
          <li class="breadcrumb-item active">Add New</li>
        </ol>
        <!-- /Breadcrumbs-->
        <!-- Add Form -->
        <h3 style="color:red" align="center">{{Session::get('message')}}</h3>
        <div class="col-md-6 offset-md-3">
        <form action="{{route('save-type')}}" method="Post">
          	@csrf
            <div class="form-group">
              <!-- <label for="type_name">Type Name</label> -->
              <input id="type_name" name="type_name" class="form-control form-control-lg" type="text" placeholder="Enter Type Name" required
              style="border-radius: 20px;">
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                Submit
              </button>
            </div>
            
          </form>
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