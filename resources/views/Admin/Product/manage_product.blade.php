@extends('Admin.admin_master')
@section('admin-home')
    <div id="content-wrapper">
      <div class="container-fluid" >
        <!-- Icon Cards-->
        <div class="row">
        </div>
        <!-- /Icon Cards-->
        <!-- DataTables Example -->
        <h3 style="color: red" align="center">{{Session::get('message')}}</h3>
        <div class="card mb-3" id="productData">
          <div class="card-header bg-white">
            <i class="fas fa-table"></i>
            All Products</div>
            
                  
               <div class="form-row">
                             <div class="col-md-3">
                <label for="pr">Product Name</label>
                <input  type="text" class="form-control form-control-sm" id="pr"
                       name="product_name"/>
                <small class="text-danger"></small>
               
            </div>
              <div class="col">
                <label for="pc">Category</label>
                <select required class="form-control form-control-sm" id="pc" name="category_id"
                        onchange="getCategories(this)">
                    <!--<option value="0">select</option>-->
                    @foreach($category as $v_category)
                        <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col" id="cat_level_one" style="display:none">
                <label for="psc">Sub-Category 1</label>
                <select  class="form-control form-control-sm" id="psc1" name="subcategory_id"
                        onchange="catLevelTwo(this)">

                    <!--<option value="0">select</option>-->

                </select>
            </div>
            <!--<div class="col" id="cat_level_two" style="display:none">-->
            <!--    <label for="psc">Sub-Category 2</label>-->
            <!--    <select  value="0" class="form-control form-control-sm" id="psc2" name="cat_level_two"-->
            <!--            onchange="catLevelThree(this)">-->
            <!--        <option value="0">select</option>-->

            <!--    </select>-->
            <!--</div>-->
            <!--<div class="col" id="cat_level_three" style="display:none">-->
            <!--    <label for="psc">Sub-Category 3</label>-->
            <!--    <select value="0" class="form-control form-control-sm" id="psc3" name="cat_level_three"-->
            <!--            onchange="catLevelFour(this)">-->
            <!--        <option value="0">select</option>-->

            <!--    </select>-->
            <!--</div>-->
            </div>
            
            <div align="center" style="margin-top:3%">
                 <button type="button" onclick="adminProductFilter(this)" class="btn btn-primary"> Submit</button>
            </div>
            
            
          <div class="card-body" >
            <div class="table-responsive">
              <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                  <tr>
                    <th style="width: 20px;">No.</th>
                    <th style="width: 300px;">Product Item</th>
                    <th style="width: 300px;">Category</th>
                    <th style="width: 300px;">Vendor</th>
                    {{-- <th style="width: 25px;">Size Color</th> --}}
                    <th style="width: 20px;">Quantity</th>
                    <th style="width: 20px;">Price</th>
                    <th style="width: 20px;">Status</th>
                    <th style="width: 20px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                	 @php($i = 1)
                   @foreach($products as $v_product)
                  <tr>
                  <td>{{$i++}}</td>
                  <td>{{$v_product->product_name}}</td>
                  <td>{{$v_product->category_name}}</td>
                  <td>{{$v_product->vendor_name}}</td>
                     {{-- @if($v_product->sc ==1)
                    <td>A/V</td>
                     @else
                    <td>N\A</td>
                     @endif  --}}
                    <td>{{$v_product->product_quantity}}</td>
                    <td>{{$v_product->currency}}{{$v_product->product_price}} </td>
                    @if($v_product->status ==1)
                    <td>Active</td>
                    @elseif($v_product->status == 2)
                    <td>Inactive</td>
                    @endif
                    <td>
                        <a
                    href="{{route('product-details',['id' =>$v_product->id])}}"
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            Details
                        </a>
                        ||
                            <a
                    href="{{route('edit-product',['id' =>$v_product->id])}}"
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            Edit
                        </a>
                        ||
                        <a
                    href="{{route('edit-spec',['id' =>$v_product->id])}}"
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            Specification Edit
                        </a>
                        
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }

            $('#blah').show();
        }

        $("#file-upload").change(function () {
            readURL(this);
        });


        // function for get brands according to vendor
        function getBrands(vendor_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var vendor_id = $(vendor_id).val();
            var url = "./get-brand/" + vendor_id;
            if (vendor_id) {
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {vendor_id: vendor_id},
                    dataType: 'json',
                    success: function (brands) {
                        console.log(brands);
                        var brand_count = brands.vendor_data.length;

                        var html = `<option value="">select</option>`;
                        for (var i = 0; i < brand_count; i++) {
                            html += `
                            <option value="${brands.vendor_data[i].id}">${brands.vendor_data[i].brand_name}</option>
                        `;
                        }
                        $('#pb').html(html);
                    }
                })
            }
        }

        // get child category level 1
        function getCategories(v) {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var cat_id = $(v).val();
            var url = "./get-categories/" + cat_id;
            if (cat_id) {
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {cat_id: cat_id},
                    dataType: 'json',
                    success: function (categories) {
                        var category_count = categories.cat_data.length;

                        var html = `<option value="">select</option>`;
                        for (var i = 0; i < category_count; i++) {
                            html += `
                            <option value="${categories.cat_data[i].id}">${categories.cat_data[i].category_name}</option>
                        `;
                        }
                        $('#psc1').html(html);
                        $("#cat_level_one").css("display", "block");
                    }
                })
            }
        }


        // // get child category level 2
        // function catLevelTwo(v) {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     var cat_id = $(v).val();
        //     var url = "./get-categories/" + cat_id;
        //     if (cat_id) {
        //         $.ajax({
        //             type: 'GET',
        //             url: url,
        //             data: {cat_id: cat_id},
        //             dataType: 'json',
        //             success: function (data) {
        //                 var category_count = data.cat_data.length;

        //                 var html = `<option value="">select</option>`;
        //                 for (var i = 0; i < category_count; i++) {
        //                     html += `
        //                     <option value="${data.cat_data[i].id}">${data.cat_data[i].category_name}</option>
        //                 `;
        //                 }
        //                 $('#psc2').html(html);
        //                 $("#cat_level_two").css("display", "block");
        //             }
        //         })
        //     }
        // }

        // // get child category level 3
        // function catLevelThree(v) {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     var cat_id = $(v).val();
        //     var url = "./get-categories/" + cat_id;
        //     if (cat_id) {
        //         $.ajax({
        //             type: 'GET',
        //             url: url,
        //             dataType: 'json',
        //             success: function (data) {
        //                 var category_count = data.cat_data.length;

        //                 var html = `<option value="">select</option>`;
        //                 for (var i = 0; i < category_count; i++) {
        //                     html += `
        //                     <option value="${data.cat_data[i].id}">${data.cat_data[i].category_name}</option>
        //                 `;
        //                 }
        //                 $('#psc3').html(html);
        //                 $("#cat_level_three").css("display", "block");
        //             }
        //         })
        //     }
        // }


    </script>
<script src="{{asset('public/client/assets/js/custom/api.js')}}"></script>
<script src="{{asset('public/admin/js/product_search.js')}}"></script>

@endsection
