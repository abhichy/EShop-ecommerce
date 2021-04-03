@extends('Admin.admin_master')
@section('admin-home')
<body id="page-top">
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="pl-5 pr-5 pt-3">
            <h2 class="text-center"><span class="badge badge-pill badge-info">{{$slider->slider_title}}</span></h2>
            <div class="text-center">
            <a href="{{route('edit-slider',['id' =>$slider->id ])}}" class="btn btn-sm btn-outline-warning" style="border-radius: 18px;"><i class="fas fa-edit"></i></a>
            {{-- <form action="" method="post" style="display:inline-block"> --}}
               
                    {{-- <input type="hidden" name="delete_slider" value="" /> --}}
            <a  href='{{route('delete-slider',['id' => $slider->id])}}' type="button"  style="border-radius: 18px;"> <i class="fas fa-trash fa-lg"></i></a>
                {{-- </form> --}}
            </div>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if ($slider->status == 1)
                    <h4 class='text-center text-success'>Active</h4>
                    @else
                    <h4 class='text-center text-danger'>Deactive</h4>
                    @endif
                   {{--       
             <h4 class='text-center text-danger'>Deleted</h4> --}}
                    <!-- List of Categories -->
                   <img class="mx-auto d-block" width="100%" src="{{asset($slider->slider_image) }}" alt="">
               <br>
               <p class="text-center">
               </p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <!--/ Logout Modal-->
  <!-- Bootstrap core JavaScript-->
  <script>

   // function showProductDetail(product){

    // $('#myModal').on('shown.bs.modal', function () {
    // $('#myInput').trigger('focus')
    // })
    // Clearing Previous Data
    //$('#product-detail').html('');
    //console.log(product);
    //$('#productDetailModal').modal('show');
    
   // }
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