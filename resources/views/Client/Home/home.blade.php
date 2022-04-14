@extends('Client.master')


@section('home-content')
    {{-- <script>
        $(document).ready(function() {
            $('#cartbtn').click(function() {
                alert('hello world');
            });
        });

    </script> --}}


    <!-- Shop-1 -->
    <section id="header" class="main-header">
        <div class="container-fluid">
            <div class="intro row">
                <div class="overlay"></div>
                <div class="banner-btn col-6 offset-6 mb-2">
                    @if (Session::get('client_id'))

                    @else
                        <a href="{{ route('client-login') }}" type="button" class="btn btn-light mb-2">Log in</a>
                        <a href="{{ route('client-register') }}" type="button" class="btn btn-primary mb-2">Sign up</a>

                    @endif
                </div>
                <!--
                    <div class="col-6 offset-6">
                        <button class="btn btn-primary">Sign in</button>
                    </div> -->
                <div class="col-6 offset-6">
                    <h2 class="header-quote">Save year-to-year</h2>
                    <p>
                        Your sweeping costs with the
                    </p>
                    <h1 class="header-title">Ecommerce<br><span class="header-quote">FAST AND EASY</span></h1>
                </div>
            </div>

        </div>

    </section>

    {{--slider--}}
    <section id="product" class="trending">
        <div class="container-fluid section-bg">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Trending <b>Products</b></h2>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                        <!-- Carousel indicators -->
                        <!--<ol class="carousel-indicators">-->
                        <!--	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
                        <!--	<li data-target="#myCarousel" data-slide-to="1"></li>-->
                        <!--	<li data-target="#myCarousel" data-slide-to="2"></li>-->
                        <!--</ol>   -->
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="row carousel-row-custom">

                                    @foreach ($carouselProducts as $product)
                                        <input type="hidden" value="{{ $regular_price = $product->product_price }}">
                                        <input type="hidden" value="{{ $discount_taka = (float) $product->discount }}">
                                        <input type="hidden" value="{{ $discount_percent = $product->discount_percent }}">
                                        <input type="hidden"
                                            value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                                        <input type="hidden"
                                            value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">
                                        <div class="col-sm-2">
                                            <div class="thumb-wrapper">

                                                @if ($discount_taka == null && $discount_percent != 0)
                                                    <div class="product-badge">{{ $discount_percent }}% OFF</div>
                                                @endif
                                                <div class="img-box">
                                                    <img src="{{ asset($product->product_image) }}"
                                                        class="img-responsive img-fluid" alt="">
                                                </div>
                                                {{-- <form> --}}
                                                    {{-- @csrf
                                                    --}}
                                                    <div class="thumb-content">
                                                        <a
                                                            href="{{ route('product', ['id' => $product->id, 'category_id' => $product->category_id]) }}">
                                                            <h4 style="color: black">{{ $product->product_name }}</h4>
                                                        </a>
                                                        <p class="item-price">
                                                            @if ($discount_taka != null || $discount_percent != 0)
                                                                <del>৳{{ $product->product_price }}</del>
                                                            @endif
                                                            <span>
                                                                @if ($discount_taka != '')
                                                                    ৳{{ $discount_price_taka }}
                                                                @else
                                                                    ৳{{ $discount_price_percent }}
                                                                @endif
                                                            </span>
                                                        </p>
                                                        <input type="hidden" name="id" id="proid-{{ $product->id }}"
                                                            value="{{ $product->id }}" />
                                                        <input type="hidden" name="qty" id="qty-{{ $product->id }}"
                                                            value="1" min="1" />


                                                        {{-- <a href="cart.html"
                                                            class="btn btn-primary">Add to Cart</a>
                                                        --}}
                                                        <button data-id="{{ $product->id }}" type="submit"
                                                            class="btn btn-primary" name="btn" id="cartbtn"
                                                            onclick="addToCart(this)" value='add-to-cart'>Add To Cart
                                                        </button>
                                                    </div>
                                                    {{--
                                                </form> --}}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="item carousel-item">
                                <div class="row carousel-row-custom">
                                    @foreach ($carouselProducts2 as $product)

                                        <input type="hidden" value="{{ $regular_price = $product->product_price }}">
                                        <input type="hidden" value="{{ $discount_taka = (float) $product->discount }}">
                                        <input type="hidden" value="{{ $discount_percent = $product->discount_percent }}">
                                        <input type="hidden"
                                            value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                                        <input type="hidden"
                                            value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">

                                        <div class="col-sm-2">
                                            <div class="thumb-wrapper">
                                                @if ($discount_taka == null && $discount_percent != 0)
                                                    <div class="product-badge">{{ $discount_percent }}% OFF</div>
                                                @endif
                                                <div class="img-box">
                                                    <img src="{{ asset($product->product_image) }}"
                                                        class="img-responsive img-fluid" alt="">
                                                </div>
                                                {{-- <form action="{{ route('add-to-cart') }}"
                                                    method="post"> --}}
                                                    <div class="thumb-content">

                                                        <a
                                                            href="{{ route('product', ['id' => $product->id, 'category_id' => $product->category_id]) }}">
                                                            <h4 style="color: black">{{ $product->product_name }}</h4>
                                                        </a>
                                                        <p class="item-price">
                                                            @if ($discount_taka != null || $discount_percent != 0)
                                                                <del>৳{{ $product->product_price }}</del> &nbsp;
                                                            @endif
                                                            <span>
                                                                @if ($discount_taka != '')
                                                                    ৳{{ $discount_price_taka }}
                                                                @else
                                                                    ৳{{ $discount_price_percent }}
                                                                @endif
                                                            </span>
                                                        </p>
                                                        <!--<input type="hidden" name="id" id="proid-{{ $product->id }}"-->
                                                        <!--value="{{ $product->id }}"/>-->
                                                        <input type="hidden" name="qty" id="qty-{{ $product->id }}"
                                                            value="1" min="1" />

                                                        <button data-id='{{ $product->id }}' type="submit"
                                                            class="btn btn-primary" name="btn" id="cartbtn"
                                                            onclick="addToCart(this)" value='add-to-cart'>Add To Cart
                                                        </button>
                                                    </div>
                                                    {{--
                                                </form> --}}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="item carousel-item">
                                <div class="row carousel-row-custom">


                                    @foreach ($carouselProducts3 as $product)

                                        <input type="hidden" value="{{ $regular_price = $product->product_price }}">
                                        <input type="hidden" value="{{ $discount_taka = (float) $product->discount }}">
                                        <input type="hidden" value="{{ $discount_percent = $product->discount_percent }}">
                                        <input type="hidden"
                                            value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                                        <input type="hidden"
                                            value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">


                                        <div class="col-sm-2">
                                            <div class="thumb-wrapper">
                                                @if ($discount_taka == null && $discount_percent != 0)
                                                    <div class="product-badge">{{ $discount_percent }}% OFF</div>
                                                @endif
                                                <div class="img-box">
                                                    <img src="{{ asset($product->product_image) }}"
                                                        class="img-responsive img-fluid" alt="">
                                                </div>
                                                <div class="thumb-content">
                                                    <a
                                                        href="{{ route('product', ['id' => $product->id, 'category_id' => $product->category_id]) }}">
                                                        <h4 style="color: black">{{ $product->product_name }}</h4>
                                                    </a>
                                                    <p class="item-price">
                                                        @if ($discount_taka != null || $discount_percent != 0)
                                                            <del>৳{{ $product->product_price }}</del> &nbsp;
                                                        @endif
                                                        <span>
                                                            @if ($discount_taka != '')
                                                                ৳{{ $discount_price_taka }}
                                                            @else
                                                                ৳{{ $discount_price_percent }}
                                                            @endif
                                                        </span>
                                                    </p>
                                                    <!--<input type="hidden" name="id" id="proid-{{ $product->id }}"-->
                                                    <!--value="{{ $product->id }}"/>-->
                                                    <input type="hidden" name="qty" id="qty-{{ $product->id }}" value="1"
                                                        min="1" />

                                                    <button data-id='{{ $product->id }}' type="submit"
                                                        class="btn btn-primary" name="btn" id="cartbtn"
                                                        onclick="addToCart(this)" value='add-to-cart'>Add To Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{--end of slider--}}
    @foreach ($categorys as $v_cat)
        <!-- Shop-1 -->
        <section class="shop shop-1">
            <div class="container-fluid page-bgc">
                <div class="row ">
                    <!--left column-->
                    <div class="col-2 sidebar-row">
                        <div class="sidebar-head mt-3">
                            <!-- Main sidebar -->
                            <div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed">
                                <div class="sidebar-content">

                                    <div class="sidebar-category sidebar-default ">
                                        <div class="category-title ">
                                            <span>{{ $v_cat->category_name }}</span>
                                        </div>
                                        <div class="category-content">
                                            <ul id="fruits-nav" class="nav flex-column">
                                                @if($v_cat->subcategory)
                                                @foreach ($v_cat->subcategory as $V_categories)
                                                    <li class="nav-item">
                                                        <a href="{{ route('sub-category', ['id' => $V_categories->id]) }}"
                                                            class="nav-link">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            {{ $V_categories->category_name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                            <!-- /Nav -->
                                        </div>
                                        <!-- /Category Content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--left column-->

                    <div class="col-10 product-row">
                        <div class="panel-1">
                            <div class="row">
                                <div class="col-sm-4 banner-1 mb-4">
                                    <div class="shop-box mb-4 mt-5">
                                        <img class="img-full img-responsive banner-1"
                                            src="{{ asset($v_cat->category_image) }}" alt="shop">
                                        <div class="">
                                            <div class="c-table">
                                                <div class="c-cell">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @if ($v_cat->product->count() > 0)
                                    @foreach ($v_cat->product as $v_product)
                                        <div class="col-sm-2">
                                            <div class="shop-box mt-5">

                                                <input type="hidden"
                                                    value="{{ $regular_price = $v_product->product_price }}">
                                                <input type="hidden"
                                                    value="{{ $discount_taka = (float) $v_product->discount }}">
                                                <input type="hidden"
                                                    value="{{ $discount_percent = $v_product->discount_percent }}">
                                                <input type="hidden"
                                                    value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                                                <input type="hidden"
                                                    value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">


                                                @if ($discount_taka == null && $discount_percent != 0)
                                                    <div class="product-badge">{{ $discount_percent }}% OFF</div>


                                                @endif
                                                <img class="img-full img-responsive"
                                                    src="{{ asset($v_product->product_image) }}" alt="shop">
                                                <div class="shop-box-hover text-center">
                                                    <div class="c-table">
                                                        <div class="c-cell">
                                                            <a
                                                                href="{{ route('product', ['id' => $v_product->id, 'category_id' => $v_product->category_id]) }}">
                                                                Show Details
                                                                <!--<span class="ion-ios-information"></span>-->
                                                            </a>
                                                            <input type="hidden" name="qty" id="qty-{{ $v_product->id }}"
                                                                value="1" min="1" />
                                                            <button class="btn btn-robot btn-sm"
                                                                data-id="{{ $v_product->id }}" type="button"
                                                                onclick="addToCart(this)">
                                                                Add to Cart
                                                                <!--<span class="ion-ios-cart"></span>-->
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shop-box-title">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a
                                                            href="{{ route('product', ['id' => $v_product->id, 'category_id' => $v_product->category_id]) }}">
                                                            <h4 style="color: black">{{ $v_product->product_name }}</h4>
                                                        </a>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <p class="shop-price">
                                                            @if ($discount_taka != null || $discount_percent != 0)
                                                                <del>৳{{ $v_product->product_price }}</del>
                                                            @endif
                                                            <input type="hidden"
                                                                value="{{ $regular_price = $v_product->product_price }}">
                                                            <input type="hidden"
                                                                value="{{ $discount_taka = (float) $v_product->discount }}">
                                                            <input type="hidden"
                                                                value="{{ $discount_percent = $v_product->discount_percent }}">
                                                            <input type="hidden"
                                                                value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                                                            <input type="hidden"
                                                                value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">


                                                            @if ($discount_taka != '')
                                                                ৳{{ $discount_price_taka }}
                                                            @else
                                                                ৳{{ $discount_price_percent }}
                                                            @endif

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                        </div>
                    </div> <!-- boxed -->
                </div>
                <!--right-column-->
            </div>
        </section>
    @endforeach

@endsection
