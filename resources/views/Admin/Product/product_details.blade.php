@extends('Admin.admin_master')
@section('admin-home')

    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="pl-5 pr-5 pt-3">
            <h2 style="color:red">{{Session::get('message')}}</h2>

            <h2 class="text-center"><span class="badge badge-pill badge-info"> Details of Product</span></h2>
            <div class="text-center">
                <a href="{{route('edit-product',['id' => $product->id])}}" class="btn btn-sm btn-outline-warning" style="border-radius: 18px;"><i class="fas fa-edit"></i></a>
            </div>

            <hr>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <!-- Product Details -->
                <h6>Name: <strong>{{$product->product_name}}</strong></h6>
                     @if($product->category)
                    <h6>Category: <strong>{{$product->category->category_name}}</strong></h6>
                     @else
                    <td> category not found</td>
                    @endif
                    {{-- <h6>
                        Total Quantity: <strong></strong>

                       <!--  <button onclick="restockProduct()" class="btn btn-sm btn-outline-warning border-0" style="border-radius: 18px;"><i class="fas fa-arrow-up"></i></button>
                        <button onclick="destockProduct()" class="btn btn-sm btn-outline-warning border-0" style="border-radius: 18px;"><i class="fas fa-arrow-down"></i></button> -->

                    </h6> --}}
                <h6>Price: <strong>{{$product->product_quantity}}</strong></h6>
                     @if($product->type)
                <h6>type: <strong>{{$product->type->type_name}}</strong></h6>
                     @else
                    <td>type not found</td>
                    @endif
                    <h6>vendor name: <strong>{{$product->Vendor->vendor_name}}</strong></h6>
                </div>

                <div class="col-md-6">
                    <h6>Description: </h6>
                <p>{!! $product->product_description !!}</p>
                </div>
            </div>
            <br>
            
             @foreach($specification as $v_spe)
                            <div class="row">
                               <div class="col-md-6">
                                    <strong>{{$v_spe->heading}} : </strong>
                           
                            <input type="hidden" name="id" value="{{$v_spe->id}}">
                            <h6><strong>{{$v_spe->specification}}</strong>
                          
                            </div>
                        </div>
            @endforeach
          
            {{--<div class="pt-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <h4 class="">
                                <span class="badge badge-pill badge-secondary"> Size & Color: <strong class="text-success"></strong></span>
                            </h4>

                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addSizeColor" style="border-radius: 50px;">
                                <i class="fas fa-plus"></i>
                            </button>

                        </div>
                        <br><br>

                            <div class="table">
                                <table class="table table-bordered" id="dataTable-" max-width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Qt</th>
                                            <th class="" style="width: 150px">Actions</th>
                                        </tr>
                                    </thead>
                                     @foreach($colorsize as $V_sizecolor )
                                    <tbody>

                                            <tr>
                                            <td>{{$V_sizecolor->size}}</td>
                                            <td>{{$V_sizecolor->color}}</td>
                                            <td>{{$V_sizecolor->quantity}}</td>

                                            <td class="">
                                                <div class='row'>
                                                    <div class="col-sm-4 mx-auto mr-auto">
                                                        <button class="btn btn-sm btn-outline-warning border-0" style="border-radius: 14px" onclick="RestockSizeColor('')"><i class="fas fa-arrow-up"></i></button>
                                                    </div>
                                                    <div class="col-sm-4 mx-auto mr-auto">
                                                        <button class="btn btn-sm btn-outline-warning border-0" style="border-radius: 14px" onclick="DestockSizeColor('')"><i class="fas fa-arrow-down"></i></button>
                                                    </div>
                                                    <div class="col-sm-4 mx-auto mr-auto">
                                                    <button class="btn btn-sm btn-outline-warning border-0" style="border-radius: 14px" onclick="editSizeColor('', '', '', '')"><i class="fas fa-edit"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                    @endforeach

                                </table>
                            </div>

                    </div>
                </div>
            </div>--}}

            <br>

            <div class="row">

                <div class="col-sm-12">
                    <div class="text-center">
                        <h4>
                            <strong class="badge badge-pill badge-danger">Image Available</strong>
                        </h4>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addImageModal" style="border-radius: 50px;">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>


                    <br>

                    <div class="tz-gallery">

                        <div class="row">

                            <div class="col-sm-6 col-md-4">
                                <a class="lightbox">

                                    <img src="{{asset($product->product_image)}}" alt="Sky">

                                </a>
                                <div class="text-center">
                                {{-- <a class="btn btn-sm btn-danger border-0" style="border-radius: 25px;"  href=""> --}}
                                        {{-- <i class="fas fa-trash"></i> --}}
                                    {{-- </a> --}}
                                </div>
                            </div>
                              @foreach($productimage as $v_img)
                             <div class="col-sm-6 col-md-4">
                                <a class="lightbox" href="">

                                <img src="{{asset($v_img->product_image)}}" alt="Sky">
                                </a>
                                <div class="text-center">
                                <a class="btn btn-sm btn-danger border-0" style="border-radius: 25px;"  href="{{route('productiamge-delete',['id' => $v_img->id])}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
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


    <!-- Product image add Modal -->
    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add More Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



        <form class="form-group" action="{{route('save-product-image')}}" method="POST" enctype="multipart/form-data">
                @csrf


                    <div class="form-check text-center">
                        <input type="checkbox" name="featured_image" value="1" class="form-check-input" id="featured">
                        <label class="form-check-label" for="featured">Make Featured Image</label>
                    </div>


                <div class="modal-body">


                <input type="hidden" name="product_id" value="{{$product->id}}">


                        <div class="">
                            <div class="text-center">
                                <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-file-upload"></i>
                                    </span>
                                    <span class="text text-white-50">Upload Image</span>
                                </label>
                                <input required id="file-upload" style="display: none" type="file" name="product_image"/>

                            </div>

                        </div>

                        <div class="">
                            <div class="text-center">
                                <div class="">
                                    <div class="">
                                        <img id="blah" src="#" alt="" style="height:300px; border: 2px solid grey" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <button type="submit" class="btn btn-primary">Save changes</button>


                </div>

            </form>

            </div>
        </div>
    </div>
    <!-- / Product image add Modal -->

    <!-- Poduct size color add Modal -->
    <div class="modal fade" id="addSizeColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add More Variation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-group" action="{{route('save-colorsize')}}" method="POST">
                    @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-row">
                        Size <br>
                        <input type="text" class="form-control" name="size">
                    </div>
                    <div class="form-row">
                        Color <br>
                        <input type="text" class="form-control" name="color">
                    </div>

                    <div class="form-row">
                        Quantity <br>
                        <input type="text" class="form-control" name="quantity">
                    </div>

                    <br>
                    <br>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>

            </div>
        </div>
    </div>
    <!-- / Product size color add modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editSizeColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add More Variation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="" method="POST">

                    <input type="hidden" id="id" name="id">
                    <input type="hidden" name="product_id" value="">


                    <div class="form-row">
                        Size <br>
                        <input type="text" id="e_size" class="form-control" name="size">
                    </div>



                    <div class="form-row">
                        Color <br>
                        <input type="text" id="e_color" class="form-control" name="color">
                    </div>

                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div>

                    <br>
                    <br>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>

            </div>
        </div>
    </div>
    <!-- /Edit Modal -->

    <!-- Restock Variation Modal -->
    <div class="modal fade" id="RestockProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="" method="POST">
                    <input type="hidden" id="R_id" name="id">

                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- /Restock Modal -->

    <!-- Destock Product Modal -->
    <div class="modal fade" id="DestockProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Destock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="" method="POST">
                    <input type="hidden" id="D_id" name="id">

                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- /Destock Product Modal -->


    <!-- Restock Product Variation Modal -->
    <div class="modal fade" id="RestockSizeColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="" method="POST">
                    <input type="hidden" id="vR_id" name="id">
                    <input type="hidden" name="product_id" value="">
                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- /Restock Product Variation Modal -->

    <!-- Destock Product Variation Modal -->
    <div class="modal fade" id="DestockSizeColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Destock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="" method="POST">
                    <input type="hidden" id="vD_id" name="id">
                    <input type="hidden" name="product_id" value="">
                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>

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

    function editSizeColor(id, size, color, qt){
        $('#e_size').val(size);
        $('#e_color').val(color);
        $('#e_qt').val(qt);
        $('#id').val(id);

        $('#editSizeColor').modal('show');
    }

    function RestockSizeColor(id) {
        $('#vR_id').val(id);
        $('#RestockSizeColor').modal('show');
    }

    function DestockSizeColor(id) {
        $('#vD_id').val(id);
        $('#DestockSizeColor').modal('show');
    }

    function destockProduct() {
        $('#DestockProduct').modal('show');
    }

    function restockProduct() {
        $('#RestockProduct').modal('show');
    }


  </script>



@endsection
