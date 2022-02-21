
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

        <form action="{{route('update-heading')}}" method="Post" enctype="multipart/form-data">
          @csrf
            <br>
            <div class="form-group">
              <label for="type_name">Heading</label>
              <input id="type_name" name="heading" class="form-control form-control-lg" type="text" value="{{$heading->heading}}" placeholder="Heading" required
              style="border-radius: 20px;">
               <input  name="id"  type="hidden" value="{{$heading->id}}">
            </div>
            
             <div class="form-group">
              <label for="type_name">Serial</label>
               <select required class="form-control" name="serial">
                 <option value="1">1</option>
                   <option value="2">2</option>
                    <option value="3">3</option>
                     <option value="4">4</option>
                      <option value="5">5</option>
                       <option value="6">6</option>
                        <option value="7">7</option>
               </select>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                update
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
 

@endsection