@extends('Admin.admin_master')
@section('admin-home')
<body id="page-top">
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <h3 style="color:red" align='center'>{{Session::get('message')}}</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Categories</li>
        </ol>
        <!-- /Breadcrumbs-->
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header bg-white">
          <a href="{{route('add-slider')}}" 
               class="btn btn-sm btn-outline-success">Add new
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" style="" cellspacing="0">
                <thead class="">
                  <tr>
                    <th style="width: 20px;">No.</th>
                    <th style="width: 30px;">Title</th>
                    <th style="width: 30px;">Content</th>
                    <th style="width: 50px;">Slider</th>
                    <th style="width: 20px;">Status</th>
                    <th style="width: 20px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach ($sliders as $V_slider)
                <tr>
                <td>{{$i++}}</td>
                <td>{{$V_slider->slider_title}}</td>
                <td>{{$V_slider->content}}</td>
                <td><img src="{{asset($V_slider->slider_image)}}" style="width:100px; height:100px" /></td>
                    @if($V_slider->status == 1)
                     <td>published</td>
                     @else
                     <td>unpublished</td>
                     @endif
                     

                      <td>
                      <a href="{{route('slider-details',['id' => $V_slider->id])}}" 
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