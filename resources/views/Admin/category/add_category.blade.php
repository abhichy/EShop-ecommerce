
@extends('Admin.admin_master')
@section('admin-home')
<body id="page-top">

    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Categories</li>
          <li class="breadcrumb-item active">Add New</li>
        </ol>
        <!-- /Breadcrumbs-->
        <!-- Add Form -->
      <h3 style='color:red' align='center'>{{Session::get('message')}}</h3>

        <div class="col-md-6 offset-md-3">

        <form action="{{route('save-category')}}" method="Post" enctype="multipart/form-data">
          @csrf
            <br>
            <div class="form-group">
              <label for="type_name">Category Name</label>
              <input id="type_name" name="category_name" class="form-control form-control-lg" type="text" placeholder="Enter Category Name" required
              style="border-radius: 20px;">

               <label for="type_name">Category Shortname</label>
              <input id="type_name" name="short_name" class="form-control form-control-lg" type="text" placeholder="Short Name" required
              style="border-radius: 20px;">

            <span style="color:red"><u>{{$errors->has('category_name')? $errors->first('category_name'):""}}</u></span>
              <input type="hidden" name="root_id" value="0"/>
            </div>

             <div class="form-check">
              <input type="checkbox" name="home_page" value="1" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Display On Home Page</label>
            </div>

            <small class="text-info">**Please set a proper suitable name for the image file before uploading.</small>
          </br>
                <div class="form-row">

                    <div class="col-md-6">

                        <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                        <span class="icon text-white-50">
                                <i class="fas fa-file-upload"></i>
                            </span>
                            <span class="text text-white-50">Upload Image</span>
                        </label>
                        <input required id="file-upload" style="display: none" type="file" name="category_image"/>
                        <span style="color:red"><u>{{$errors->has('category_image')? $errors->first('category_image'):""}}</u></span>

                    </div>

                    <div class="col-md-9">
                        <div class="">
                            <div class="">
                                <img id="blah" src="#" alt="" style="height:300px; border: 2px solid grey" />
                            </div>
                        </div>
                    </div>
                </div>

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

</body>
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
