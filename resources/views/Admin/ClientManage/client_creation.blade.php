@extends('Admin.admin_master')
@section('admin-home')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Add New Client
                </div>
                <h3 style="color:red" align="center">{{ Session::get('message') }}</h3>
                <div class="card-body">
                    <form action="{{ route('registration-process') }}" method="post">
                        @csrf
                        <div class="form-group row align-items-center">
                            <div class="col mt-4">
                                <input name="full_name" type="text" class="form-control" placeholder="Full Name">
                                <span
                                    class="text-danger">{{ $errors->has('full_name') ? $errors->first('full_name') : ' ' }}</span>

                            </div>
                        </div>
                        <div class="form-group row align-items-center mt-4">
                            <div class="col">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>

                            </div>
                        </div>

                        <div class="form-group row align-items-center mt-4">
                            <div class="col">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <span
                                    class="text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>

                            </div>
                        </div>

                        <div class="form-group row align-items-center mt-4">
                            <div class="col">
                                <input type="text" name="contact_no" class="form-control" placeholder="Contact No">
                                <span
                                    class="text-danger">{{ $errors->has('contact_no') ? $errors->first('contact_no') : ' ' }}</span>

                            </div>

                        </div>

                        {{-- <div class="form-group row mt-4">
                        <div class="col text-center">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    I Read and Accept <a href="https://www.froala.com">Terms and Conditions</a>
                                </label>
                            </div>


                        </div>
                    </div> --}}
                        <div class="form-group row align-items-center mt-4">
                            <div class="col text-center">
                                <input type="submit" value="Register" class="btn btn-success">
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
