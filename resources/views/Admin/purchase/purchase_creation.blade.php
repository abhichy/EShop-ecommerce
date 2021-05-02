@extends('Admin.admin_master')
@section('admin-home')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Icon Cards-->
            <div class="row">

            </div>
            <!-- /Icon Cards-->
            <!-- DataTables Example -->
            <h3 style="color: red" align="center">{{ Session::get('message') }}</h3>
            <div class="card mb-3">
                <div class="card-header bg-white">
                    <i class="fas fa-table"></i>
                    Purchase Transaction
                </div>


                <div class="card-body">
                    <form action="{{ route('save_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Invoice No.</label>
                                <input type="text" class="form-control input-sm" name="email" id="inputEmail4">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Date</label>
                                <input type="date" class="form-control input-sm" name="vendor_date" id="">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Vendor List</label>
                                <select type="text" class="form-control input-sm ">
                                    <option>Please Select</option>
                                    @foreach ($vendor as $v_vendor)

                                        <option>{{ $v_vendor->vendor_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- <div class="col text-center">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div> --}}
                    </form>
                </div>
                <form id="formId" method="post">
                    <div class="card-body" id="productData">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="border-style: dashed" width="100%"
                                cellspacing="0">
                                <thead class="">
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                        <th>Discount (%)</th>
                                        <th>Net</th>
                                        {{-- <th style="width: 20px;">Price</th> --}}
                                        <th>Action</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <?php
                                        for ($i=0; $i <=0 ; $i++) {

                                    ?>
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td> <select id="product-{{$i}}" onchange="productwiseprice(this.value,{{$i}})" class="js-data-example-ajax form-control"></select> </td>
                                        <td><input type="number" size="2" onkeyup="productQty(this.value,{{$i}})" id="qty-{{$i}}"  class="form-control input-sm" name="quantity[]"
                                                id="inputEmail4" /></td>
                                        <td><input type="number" size="2" id="price-{{$i}}" class="form-control input-sm" name="price[]"
                                                id="inputEmail4" /></td>
                                        <td><input type="number" size="2" readonly id="subtotals-{{$i}}" class="form-control input-sm subtotal" name="sub_total[]"
                                                id="inputEmail4" /></td>

                                        <td><input type="number" size="2" id="discount-{{$i}}" onchange="discount(this.value,{{$i}})" class="form-control input-sm finalDiscount" name="discount[]"
                                                id="inputEmail4" /></td>
                                        <td>
                                            <input type="number" readonly id="net-{{$i}}" size="2" class="form-control input-sm netAmounts" name="net[]"
                                                id="inputEmail4" />
                                            <input type="hidden" readonly id="hiddennet-{{$i}}" size="2" class="form-control input-sm" name="hiddennet[]"
                                                id="inputEmail4" />
                                            </td>
                                        <td>
                                            <button id="add_row" onclick="addrow()"
                                                class="btn btn-success pull-left btn-sm">+
                                            </button>
                                            {{-- <button id='delete_row' onclick="remove_div($i)"
                                                class="pull-right btn btn-danger btn-sm">-</button> --}}
                                        </td>
                                    </tr>
                                    <?php   } ?>
                                </tbody>

                                <tbody>

                                </tbody>

                                <tbody id="dynamicRow">

                                </tbody>
                </form>
                <tr>
                    {{-- <th colspan="4">Total</th>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td></td> --}}
                </tr>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="border-style: dashed" width="100%"
                                cellspacing="0">
                                <thead class="">
                                    <tr>
                                        <th style="vertical-align: middle">Total Value</th>
                                        <td> <input type="number" readonly id="Totalvalue" class="form-control input-sm "
                                                id="inputEmail4"> </td>
                                    </tr>

                                    <tr>
                                        <th style="vertical-align: middle">Discount (BDT)</th>
                                        <td> <input type="number" id="finalDiscount" onkeyup="Finaldiscount()" class="form-control input-sm" name="email" id="inputEmail4">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="vertical-align: middle">Discount (%)</th>
                                        <td> <input type="number" id="" class="form-control input=sm">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="vertical-align: middle">Net Amount</th>
                                        <td> <input type="number" readonly id="finalnetAmounts" class="form-control input-sm" name="net">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="vertical-align: middle">Remarks</th>
                                        <td> <textarea class="form-control input-sm" name="email"
                                                id="inputEmail4"></textarea> </td>
                                    </tr>

                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col text-center">
                            <input type="submit" value="CONFIRM" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <script src="{{ asset('public/admin/js/purchase_transection.js') }}"></script>
@endsection
