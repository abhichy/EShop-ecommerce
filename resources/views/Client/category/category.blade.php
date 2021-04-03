@extends('Client.master')


@section('home-content')

    <section class="shop shop-1 sub-cat">
        <div class="container-fluid page-bgc">
            <div class="row">
                <!--left column-->
                <div class="col-3">
                    <div class="sidebar-head">
                        <!-- Main sidebar -->
                        <div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed">
                            <div class="range-box mb-2">
                                <h5 class="text-center">Let us know your budget in ৳</h5>
                                <div class="d-flex my-4">
                                    <div class="w-75">
                                        <!--<input type="range" class="custom-range" id="productPrice" min="1" max="1000000">-->
                    <input type="range" name="ageInputName" class="custom-range" id="productPrice" value="0" min="1" max="10000" oninput="ageOutputId.value = productPrice.value">
                                <output name="ageOutputName" id="ageOutputId">0৳</output>
                                    </div>
                                    <span class="font-weight-bold ml-2 valueSpan2"></span>
                                </div>
                            <!--<button type="button" id="findBtn" class="btn btn-primary">find</button>-->

                            </div>
                            <div class="sidebar-content">

                                <div class="sidebar-category sidebar-default sub-category">
                                    <div class="category-title">
                                        <span>PRODUCT CATEGORIES</span>
                                    </div>
                                    <div class="category-content">
                                        <ul id="fruits-nav-sub" class="nav flex-column">
                                            @foreach($categories as $category)
                                                <li class="nav-item">
                                                    <input data-id='{{$category->id}}' class="form-check-input cate_filter" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{$category->category_name}}
                                                    </label> <br>
                                                </li>
                                            @endforeach


                                        </ul>
                                        <!-- /Nav -->
                                    </div>
                                    <!-- /Category Content -->
                                </div>
                                <!--sidebar-category-product categories-->
                            </div>

                            <!--brands sidebar-->
                            <div class="sidebar-category sidebar-default sub-category">
                                <div class="category-title ">
                                    <span>PRODUCT BRANDS</span>
                                </div>
                                <div class="category-content">
                                    <ul id="fruits-nav-sub" class="nav flex-column">
                                        @foreach($brands as $brand)
                                            <li class="nav-item">
                                                <!--<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">-->
                                                <input data-id="{{$brand->id}}" class="form-check-input brandFilter" type="checkbox" value="{{$brand->id}}" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">{{$brand->brand_name}}</label> <br>
                                            </li>
                                        @endforeach



                                    </ul>
                                    <!-- /Nav -->
                                </div>
                                <!-- /Category Content -->
                            </div>
                            <!--brands-->
                        </div>
                    </div>
                </div>
                <!--left column-->

                <div class="col-9 product-row" id="productData">
                    <div class="col-12 cat-title">
                       <h1 class="text-center text-white pt-4">Mobile Category</h1>
                    </div>




                    <!--<div class="container-fluid">-->
                    <div class="row">
                        <!--<div class="boxed">-->
                        @foreach($products as $product)
                            <div class="col-sm-3">
                                {{-- <form action="{{route('add-to-cart')}}" method="post">
                                    @csrf --}}
                            <div class="shop-box mt-5">

                                <input type="hidden" value="{{$regular_price = $product->product_price}}">
                                <input type="hidden" value="{{$discount_taka = (float)$product->discount}}">
                                <input type="hidden" value="{{$discount_percent = $product->discount_percent}}">
                                <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                                <input type="hidden" value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}">



                                        @if($discount_taka ==null && $discount_percent!=0)
                                            <div class="product-badge">{{$discount_percent}}% OFF</div>
                                        @endif
                                        <img class="img-full img-responsive"
                                             src="{{asset($product->product_image)}}" alt="shop">
                                        <div class="shop-box-hover text-center">
                                            <div class="c-table">
                                                <div class="c-cell">
                                                    <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                        Show Details

                                                    </a>
                                                    <!--<input type="hidden" name="id" id="proid-{{$product->id}}"-->
                                                           <!--value="{{$product->id}}"/>-->
                                                    <input type="hidden" name="qty" id="qty-{{$product->id}}"
                                                           value="1" min="1"/>
                                                    <button class="btn btn-robot btn-sm" data-id="{{$product->id}}" type="button"
                                                            onclick="addToCart(this)">
                                                        Add To Cart
                                                        <!--<span class="ion-ios-cart"></span>-->
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shop-box-title">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {{--<h4>{{$v_product->product_name}}</h4>--}}
                                                <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                    <h4 style="color: black">{{$product->product_name}}</h4>
                                                </a>
                                                {{-- <h4>MO: <span class="thin">#00SS5</span></h4> --}}
                                            </div>

                                            <div class="col-sm-3">
                                                <p class="shop-price">
                                                    @if($discount_taka!=null || $discount_percent!=0)
                                                    <del>৳{{$product->product_price}}</del>
                                                    @endif

                                                    {{--<input type="hidden" value="{{$regular_price = $v_product->product_price}}">
                                                    <input type="hidden" value="{{$discount_taka = (float)$v_product->discount}}">
                                                    <input type="hidden" value="{{$discount_percent = $v_product->discount_percent}}">
                                                    <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                                                    <input type="hidden" value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}">--}}

                                                    @if($discount_taka!='')
                                                    ৳{{$discount_price_taka}}
                                                    @else
                                                    ৳{{$discount_price_percent}}
                                                    @endif

                                                </p>

                                                <!--<div class="star">-->
                                                <!--    <span class="ion-ios-star"></span>-->
                                                <!--    <span class="ion-ios-star"></span>-->
                                                <!--    <span class="ion-ios-star"></span>-->
                                                <!--    <span class="ion-ios-star-half"></span>-->
                                                <!--    <span class="ion-ios-star-outline"></span>-->
                                                <!--</div>-->
                                            </div>

                                            <!--<div class="col-sm-2">-->
                                            <!--    <p class="disc-product-price"><del>300.00 BDT</del></p>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                        {{-- </form> --}}
                    </div>
                @endforeach

                    </div>






                    <!--<div class="row">-->
                    <!--    <div class="col-9">-->
                    <!--        <nav aria-label="Page navigation" class="pager justify-content-center">-->
                    <!--          <ul class="pagination">-->
                    <!--            <li class="page-item">-->
                    <!--              <span class="page-link">Previous</span>-->
                    <!--            </li>-->
                    <!--            <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
                    <!--            <li class="page-item">-->
                    <!--              <span class="page-link">-->
                    <!--                2-->
                    <!--                <span class="sr-only">(current)</span>-->
                    <!--              </span>-->
                    <!--            </li>-->
                    <!--            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                    <!--            <li class="page-item">-->
                    <!--              <a class="page-link" href="#">Next</a>-->
                    <!--            </li>-->
                    <!--          </ul>-->
                    <!--         </nav>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div> <!-- boxed -->
            </div>
            <!--right-column-->
        </div>
    </section>
    <script src="{{asset('public/client/assets/js/custom/cart.js')}}"></script>
    {{-- <script src="{{asset('client/assets/js/custom/api.js')}}"></script> --}}
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="{{asset('public/client/assets/js/custom/filter.js')}}"></script>


@endsection
