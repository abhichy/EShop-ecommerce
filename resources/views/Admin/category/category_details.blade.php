@extends('Admin.admin_master')
@section('admin-home')

<div id="content-wrapper">

<div class="container-fluid">
<div class="pl-5 pr-5 pt-3">

  <h2 class="text-center"><span class="badge badge-pill badge-info"></span></h2>
    <h2 class="text-center"><span class="badge badge-pill badge-success"></span></h2>
  <div class="text-center">

  {{--<a href="{{route('edit-category',['id' => $category->id])}}" class="btn btn-sm btn-outline-warning" style="border-radius: 18px;">{{$category->category_name}}<i class="fas fa-edit"></i></a>--}}

  </div>
</div>
  <hr>
  <br>

  <div class="row">
      <div class="col-md-6 offset-md-3">
          <!-- List of Categories -->
      <img class="rounded-circle mx-auto d-block" width="50%" src="{{asset($category->category_image)}}" alt="">


      <h5 class="text-center">


          {{-- This is the root category --}}


        <!-- This category belongs to <strong>  </strong> category -->
      </h5>



      <br>

      <!-- <h5 class="text-center">This category has the following sub-categories</h5>     -->

      <br>

      <ul class="list-group list-group-flush">
              <li class="list-group-item text-center"></li>

      </ul>

      </div>


  </div>


</div>
</div>
<!-- /.container-fluid -->

<!-- Sticky Footer -->

<!-- Sticky Footer -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

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
