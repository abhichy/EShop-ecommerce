@extends('Admin.admin_master')
@section('admin-home')
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Add a New Product to Your Inventory
                </div>
                <h3 style="color:red" align="center">{{Session::get('message')}}</h3>
                <div class="card-body">
                    <form class="form-group" action="{{route('add-spec-process')}}" method="POST" enctype="multipart/form-data" name="editProductForm">
                        @csrf
                
                        <div class="form-row">
                          
                        
                        
                        </div>
                            
                          

                        
                        
                         
                        
                        
                      {{--  
                      @foreach($specification as $v_spe)
                        <div class="col-md-3" >
                            
                             
                            <div class="row">
                               
                            <label for="product_specification"></label>
                            
                              A : 
                             
                              <strong> <input type="text"  name="product_specification[]" value="{{$v_spe->specification}}"class="form-control">
                             
                              </strong>
                           <input type="hidden" value={{$v_spe->id}} name="spe_id[]" class="form-control">
                           
                          
                            </div>
                            <div class="row">
                               
                            <label for="product_specification"></label>
                            
                              B : 
                             
                              <strong> <input type="text"  name="product_specification[]" value="{{$v_spe->specification}}"class="form-control">
                               @if(!empty($v_spe->specification))
                              <a href="{{route('delete-spcification',['id' => $v_spe->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                              @endif
                              </strong>
                           <input type="hidden" value={{$v_spe->id}} name="spe_id[]" class="form-control">
                           
                          
                            </div>
                            
                            
                            <div class="row">
                               
                            <label for="product_specification"></label>
                            
                              C : 
                             
                              <strong> <input type="text"  name="product_specification[]" value="{{$v_spe->specification}}"class="form-control">
                               @if(!empty($v_spe->specification))
                              <a href="{{route('delete-spcification',['id' => $v_spe->id])}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                              @endif
                              </strong>
                           <input type="hidden" value={{$v_spe->id}} name="spe_id[]" class="form-control">
                           
                          
                            </div>
                        </div>
                        @endforeach
            --}}
            
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
                                <input required type="text" class="form-control" name="specification"/>
                                <small class="text-danger"></small>
                            </div>
                            
                            </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="text-center pt-5">
                                    <input type="submit" class="btn btn-primary btn-xl" value="Update">
                                    <!--<button type="submit" class="btn btn-primary btn-xl" value="Add New">-->
                                    {{--
                                        <a href="{{route('add-spec',['id' =>$product->id])}}" class="btn btn-primary btn-xl">Add New</a>
                                        --}}
                                    <br>
                                </div>
                            </div>
                        </div>
                    </form>
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
    <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Product Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="product-detail">

                    <h2 id="product-name"></h2>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    

@endsection
