@extends('Admin.admin_master')
@section('admin-home')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>

                </div>
                <h3 style="color:red" align="center">{{Session::get('message')}}</h3>
                <div class="card-body">
                    <form class="form-group" action="{{route('update-spec',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data" name="editProductForm">
                        @csrf

                        <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                        <div class="form-row">
                        </div>
                      @foreach($specification as $v_spe)
                        <div class="col-md-3" >
                            <div class="row">
                            <label for="product_specification"></label>
                              {{$v_spe->heading}} :
                              <strong> <input type="text"   value="{{$v_spe->specification}}"class="form-control speci" id="{{$v_spe->id}}" >

                               @if(!empty($v_spe->specification))
                              <a href="{{route('delete-spcification',['id' => $v_spe->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                              @endif
                              </strong>
                                <input type="hidden" id="hlp">
                                <input type="hidden"  class="proid" value="{{$v_spe->id}}" name="product_id"/>
                           <input type="hidden"  id="specification_id" name="specification_id" class="form-control" >
                                <input type="hidden"  id="product_specification" name="product_specification" >

                            </div>
                        </div>
                        @endforeach
                      <?php
                      $speci = DB::table('specifications')
                      ->where('product_id',$product->id)
                      ->first();
                      ?>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="text-center pt-5">
                                    @if(empty($speci))

                                    @else
                                    <input type="submit" class="btn btn-primary btn-xl" value="Update">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                  <form class="form-group" action="{{route('add-spec-process')}}" method="POST" enctype="multipart/form-data" name="editProductForm">
                        @csrf
                     <div class="form-row">
                              <div class="col-md-6">
                                <label for="pc">Heading</label>
                                <select required class="form-control form-control-sm" id="pc" name="heading">
                                    <option value="0">select</option>
                                    @foreach($heading as $v_heading)
                                        <option value="{{$v_heading->heading}}">{{$v_heading->heading}}</option>
                                    @endforeach
                                </select>
                            </div>

                             <div class="col-md-6">
                                <label for="product_name">Specification</label>
                                <input  required type="text" class="form-control " name="specification"/>
                                <input type="hidden" class="proidd" value="{{$product->id}}" name="product_id"/>
                                <small class="text-danger"></small>
                            </div>

                            </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="text-center pt-5">
                                    <input type="submit" class="btn btn-primary btn-xl" value="save">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </form>


            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    </div>
<script src="{{asset('public/client/assets/js/custom/api.js')}}"></script>
<script src="{{asset('public/admin/js/update_specification.js')}}"></script>
@endsection
