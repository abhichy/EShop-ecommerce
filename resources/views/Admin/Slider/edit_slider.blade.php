@extends('Admin.admin_master')
@section('admin-home')

<body id="page-top">
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Sliders</li>
          <li class="breadcrumb-item active">Add New</li>
        </ol>
        <!-- /Breadcrumbs-->
        <!-- Add Form -->
        <div class="col-md-6 offset-md-3">
        <form action="{{route('update-slider')}}" method="Post" enctype="multipart/form-data">    
            @csrf     
            <div class="form-group">
              <!-- <label for="type_name">Type Name</label> -->
            <input id="slider_title" name="slider_title" value="{{$slider->slider_title}}" class="form-control form-control-lg" type="text" placeholder="Enter Slider Title" required
              style="border-radius: 20px;">
              <span style="color:red"><u>{{$errors->has('slider_title')? $errors->first('slider_title'):""}}</u></span>

              <input id="slider_title" name="id" value="{{$slider->id}}" class="form-control form-control-lg" type="hidden" placeholder="Enter Slider Title" required
              style="border-radius: 20px;">
            </div>
            <br>
            <div class="form-group">
            <textarea name="content" id="content" col="10" row="3" class="form-control form-control-lg" style="border-radius: 20px;" placeholder="Write Slider Content ">{{$slider->content}}</textarea>
            <span style="color:red"><u>{{$errors->has('content')? $errors->first('content'):""}}</u></span>

            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" {{$slider->status==1 ? "checked" : "" }} required >
              <label class="form-check-label" for="exampleRadios1">
                Active
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0"  {{$slider->status==0 ? "checked" : "" }} required >
              <label class="form-check-label" for="exampleRadios2">
                Deactive
              </label>
            </div>


            <small class="text-info">**Please set a proper suitable name for the image file before uploading.</small>
                <div class="form-row">
                    
                    <div class="col-md-6">
                        
                        <label for="slider_image" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                        <span class="icon text-white-50">
                                <i class="fas fa-file-upload"></i>
                            </span>
                            <span class="text text-white-50">Upload Image</span>
                        </label>
                        <input id="slider_image" style="display: none" type="file" name="slider_image"/>
                        <span style="color:red"><u>{{$errors->has('slider_image')? $errors->first('slider_image'):""}}</u></span>
                    <img src="{{asset($slider->slider_image)}}" >
                    </div> 

                    <div class="col-md-9">
                        <div class="">
                            <div class="">
                                <img id="blah" src="" width="100%" alt=""/><br>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary mt-2" style="border-radius: 20px;">
                Update
              </button>
            </div>
          </form>
        </div>  
        <!-- /Add Form -->
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
<script>
// $('#blah').hide();


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
    $("#slider_image").change(function() {
    readURL(this);
});        

</script>


@endsection