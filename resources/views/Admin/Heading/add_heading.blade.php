
@extends('Admin.admin_master')
@section('admin-home')
<body id="page-top">

    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Heading</li>
          <li class="breadcrumb-item active">Add New</li>
        </ol>
        <!-- /Breadcrumbs-->
        <!-- Add Form -->
      <h3 style='color:red' align='center'>{{Session::get('message')}}</h3>

        <div class="col-md-6 offset-md-3">

        <form action="{{route('save-heading')}}" method="Post" enctype="multipart/form-data">
          @csrf
            <br>
            <div class="form-group">
              <label for="type_name">Heading</label>
              <input id="type_name" name="heading" class="form-control form-control-lg" type="text" placeholder="Heading" required
              style="border-radius: 20px;">
            </div>
            
            <div class="form-group">
              <label for="type_name">Serial</label>
              <input id="type_name" name="serial" class="form-control form-control-lg" type="text" placeholder="serial" required
              style="border-radius: 20px;">
            </div>
            
            <!--<div class="form-group">-->
            <!--  <label for="type_name">Serial</label>-->
            <!--   <select required class="form-control" name="serial">-->
            <!--     <option value="1">1</option>-->
            <!--       <option value="2">2</option>-->
            <!--        <option value="3">3</option>-->
            <!--         <option value="4">4</option>-->
            <!--          <option value="5">5</option>-->
            <!--           <option value="6">6</option>-->
            <!--            <option value="7">7</option>-->
            <!--   </select>-->
            <!--</div>-->

            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                Save
              </button>
            </div>
          </form>

        </div>  
        <!-- /Add Form -->

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
   
      <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> -->

  <!-- Logout Modal-->
  
  <!--/ Logout Modal-->


  <!-- Bootstrap core JavaScript-->



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
<script>
$('#blah').hide();


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
        }

        $('#blah').show();
    }

    $("#file-upload").change(function() {
    readURL(this);
});        



</script>

@endsection