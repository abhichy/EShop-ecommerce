@extends('Admin.admin_master')
@section('admin-home')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Update New Vendor
                </div>
                <h3 style="color:red" align="center">{{ Session::get('message') }}</h3>
                <div class="card-body">
                    <form action="{{route('save_update')}}" method="post">
                        @csrf
                            <div class="form-row">

                              <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" value="{{$vendor->email}}" class="form-control" name="email" id="inputEmail4">
                              </div>

                               <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input type="text" value="{{$vendor->vendor_name}}" class="form-control" name="vendor_name" id="">
                                <input type="hidden" value="{{$vendor->id}}" class="form-control" name="id">
                              </div>


                              <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" value="{{$vendor->password}}" class="form-control" name="password" id="inputPassword4">
                              </div>
                               <div class="form-group col-md-6">
                                <label >Phone</label>
                                <input type="text" value="{{$vendor->phone}}" name="phone" class="form-control" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputAddress">Address</label>
                              <input type="text" value="{{$vendor->location}}" class="form-control" name="location" id="inputAddress" placeholder="Enter Details">
                            </div>

                            <div class="form-row">
                               <div class="form-group col-md-6">
                                <label for="">NID</label>
                                {{-- <input type="file" name="nid" id=""> --}}
                              </div>
                          </div>
                            <button type="submit" class="btn btn-primary">Register</button>
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
    <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
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
                    data: {
                        vendor_id: vendor_id
                    },
                    dataType: 'json',
                    success: function(brands) {
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
                    data: {
                        cat_id: cat_id
                    },
                    dataType: 'json',
                    success: function(categories) {
                        var category_count = categories.cat_data.length;

                        var html = `<option value="">Select</option>`;
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


        // get child category level 2
        function catLevelTwo(v) {
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
                    data: {
                        cat_id: cat_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var category_count = data.cat_data.length;

                        var html = `<option value="">Select</option>`;
                        for (var i = 0; i < category_count; i++) {
                            html += `
                                <option value="${data.cat_data[i].id}">${data.cat_data[i].category_name}</option>
                            `;
                        }
                        $('#psc2').html(html);
                        $("#cat_level_two").css("display", "block");
                    }
                })
            }
        }

        // get child category level 3
        function catLevelThree(v) {
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
                    dataType: 'json',
                    success: function(data) {
                        var category_count = data.cat_data.length;

                        var html = `<option value="">Select</option>`;
                        for (var i = 0; i < category_count; i++) {
                            html += `
                                <option value="${data.cat_data[i].id}">${data.cat_data[i].category_name}</option>
                            `;
                        }
                        $('#psc3').html(html);
                        $("#cat_level_three").css("display", "block");
                    }
                })
            }
        }

    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    </script>




@endsection
