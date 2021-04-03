@extends('Client.master')


@section('home-content')


    <div class="container">
        <div class="card mb-4">
            <!--<div class="container-fliud">-->
            <h3 class="text-center text-success"></h3>
            <div class="wrapper row">

                <div class="preview col-md-4">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-0"><img src="{{ asset($product->product_image) }}" /></div>
                        @foreach ($productImages as $productImage)
                            <div class="tab-pane" id="pic-{{ $productImage->id }}"><img
                                    src="{{ asset($productImage->product_image) }}" /></div>
                        @endforeach
                        {{-- <div class="tab-pane" id="pic-3"><img src="{{asset($product->product_image)}}"/></div>
                        <div class="tab-pane" id="pic-4"><img src="{{asset($product->product_image)}}"/></div>
                        <div class="tab-pane" id="pic-5"><img src="{{asset($product->product_image)}}"/></div> --}}
                    </div>


                    <ul class="preview-thumbnail nav nav-tabs">

                        <li class="active"><a data-target="#pic-0" data-toggle="tab"><img
                                    src="{{ asset($product->product_image) }}" /></a></li>
                        @foreach ($productImages as $productImage)
                            <li><a data-target="#pic-{{ $productImage->id }}" data-toggle="tab"><img
                                        src="{{ asset($productImage->product_image) }}" /></a></li>
                            {{-- <li><a data-target="#pic-3" data-toggle="tab"><img
                                        src="{{asset($product->product_image)}}"/></a></li>
                            <li><a data-target="#pic-4" data-toggle="tab"><img
                                        src="{{asset($product->product_image)}}"/></a></li>
                            <li><a data-target="#pic-5" data-toggle="tab"><img
                                        src="{{asset($product->product_image)}}"/></a></li> --}}
                        @endforeach
                    </ul>


                </div>

                <div class="details col-md-4">

                    <h4 class="product-details-title mt-4">{{ $product->product_name }}</h4>
                    <!--<div class="rating">-->
                    <!--    <div class="stars">-->
                    <!--        <span class="fa fa-star checked"></span>-->
                    <!--        <span class="fa fa-star checked"></span>-->
                    <!--        <span class="fa fa-star checked"></span>-->
                    <!--        <span class="fa fa-star"></span>-->
                    <!--        <span class="fa fa-star"></span>-->
                    <!--    </div>-->
                    <!--    <span class="review-no">41 reviews</span>-->
                    <!--</div>-->

                    <input type="hidden" value="{{ $regular_price = $product->product_price }}">
                    <input type="hidden" value="{{ $discount_taka = (float) $product->discount }}">
                    <input type="hidden" value="{{ $discount_percent = $product->discount_percent }}">
                    <input type="hidden" value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                    <input type="hidden"
                        value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">

                    <p class="product-description">{!! $product->product_description !!} </p>
                    <h5 class="text-color">
                        @if ($discount_taka == null && $discount_percent != 0)
                            {{ $discount_percent }}% OFF
                        @endif
                    </h5>
                    <h5 class="price">current price:
                        <span>
                            <del>৳ {{ $product->product_price }}
                            </del>
                            @if ($discount_taka != '')
                                ৳ {{ $discount_price_taka }}
                            @else
                                ৳ {{ $discount_price_percent }}
                            @endif
                        </span>
                    </h5>
                    <!--<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>-->
                    <!--<h5 class="sizes">Model:-->
                    <!--    <span class="size" data-toggle="tooltip" title="small">S</span>-->
                    <!--    <span class="size" data-toggle="tooltip" title="medium">X</span>-->
                    <!--    <span class="size" data-toggle="tooltip" title="large">XS</span>-->
                    <!--    <span class="size" data-toggle="tooltip" title="xtra large">XXS</span>-->
                    <!--</h5>-->
                    <!--<h5 class="colors">colors:-->
                    <!--    <span class="color orange"></span>-->
                    <!--    <span class="color green"></span>-->
                    <!--    <span class="color blue"></span>-->
                    <!--</h5>-->

                    <div class="quantity input-group">
                        <span class="input-group-btn">
                            <button data-id="{{ $product->id }}" type="button" onclick="decreaseValue(this)"
                                class="btn btn-outline-danger btn-number" data-type="minus" data-field="quant[1]">
                                <span class="ion-ios-minus"></span>
                            </button>
                        </span>
                        {{-- <input type="text" name="quant[1]" id="number" class="form-control input-number" value="1" min="1" max="10"> --}}
                        <input type="number" value="1" name="qty" id="qty-{{ $product->id }}"
                            class="form-control input-number" min="1" max="10">
                        <span class="input-group-btn">
                            <button data-id="{{ $product->id }}" type="button" onclick="increaseValue(this)"
                                class="btn btn-outline-success btn-number" data-type="plus" data-field="quant[1]">
                                <span class="ion-ios-plus"></span>
                            </button>
                        </span>
                    </div>

                    <div class="action mt-3">
                        {{-- <a type="button" class="add-to-cart btn btn-default">ORDER NOW</a> --}}

                        <input type="hidden" id="proid-{{ $product->id }}" name="id" value="{{ $product->id }}">
                        {{-- <input type="number" id="qty-{{$product->id}}" name="qty" min="1"> --}}
                        <button data-id="{{ $product->id }}" type="button" class="btn btn-outline-default mt-4 mb-4"
                            onclick="addToCart(this)">ADD TO CART
                        </button>

                        <!-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> -->
                        {{-- </button> --}}
                    </div>
                </div>


                <div class="delivery-details col-md-2">
                    <p><span class="ion-cash"></span> &nbsp; Cash on delivery</p>
                    <p><span class="ion-ios-rewind"></span>&nbsp; 3 days happy return</p>
                    <p><span class="ion-android-car"></span>&nbsp; Delivery Charge Tk. <br> 50 (Online Order) </p>
                    <p><span class="ion-android-hand"></span>&nbsp; Purchase & Earn</p>


                </div>



            </div>
        </div>
    </div>


    <!--review and specification tab-->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="nav nav-tabs" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" href="#desc" role="tab" data-toggle="tab">Product Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#spec" role="tab" data-toggle="tab">Product Specification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review" role="tab" data-toggle="tab">Product Review</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">


                    <!--1st tab-->

                    <div role="tabpanel" class="tab-pane active" id="desc">
                        <div class="review-block">
                            <!--<h2 class="title mt0 text-center mb-5">Customer Review</h2>-->
                            <!--<hr/>-->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="review-block-description">
                                        {!! $product->product_description !!}
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--2nd tab-->

                    <div role="tabpanel" class="tab-pane fade" id="spec">
                        <div class="review-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="review-block-description text-center">
                                        {{ $product->product_specification }}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="review">
                        <div class="review-block">
                            <!--<h2 class="title mt0 text-center mb-5">Customer Review</h2>-->
                            <!--<hr/>-->

                            @foreach ($reviews as $review)
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="{{ asset('/') }}public/client/assets/images/user.jpg"
                                            class="img-rounded">
                                        <div class="review-block-name"><a href="#">{{ $review->full_name }}</a></div>
                                        <div class="review-block-date">{{ $review->created_at }}</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="review-block-rate mb-3">


                                            @if ($review->rating == 1)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>

                                            @elseif($review->rating==2)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                            @elseif($review->rating==3)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                            @elseif($review->rating==4)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-default btn-grey btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                            @elseif($review->rating==5)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    aria-label="Left Align">
                                                    <span class="ion-ios-star"></span>
                                                </button>
                                            @endif
                                        </div>


                                        <div class="review-block-description">{{ $review->description }}
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            @endforeach


                            <div class="row">
                                <div class="col-sm-12">
                                    <!--<h4 class="text-center">Write a review</h4>-->

                                    <section class='rating-widget col-md-6'>
                                        <div class='rating-stars text-center'>
                                            <ul id='stars' class="mr-5">
                                                <li class='star' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Fair' data-value='2'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Good' data-value='3'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Excellent' data-value='4'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='WOW!!!' data-value='5'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>

                                            </ul>
                                            <span
                                                class="text-danger ml-5">{{ $errors->has('rating') ? $errors->first('rating') : ' ' }}</span>
                                        </div>
                                    </section>


                                    <form action="{{ route('product-review') }}" class="contact-form" id="contactForm"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea required class="form-control" rows="2"
                                                        placeholder="Write a review..." name="description"></textarea>
                                                    <span
                                                        class="text-danger">{{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                                                </div> <!-- /.form-group -->
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="client_id"
                                                        value="{{ Session::get('client_id') }}">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="">
                                                    <div class="">
                                                        <img id="blah" src="#" alt=""
                                                            style="height:300px; border: 2px solid grey" />
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- <div class='success-box'>
                                                        <div class='clearfix'></div>
                                                        <div class='text-message'>
                                                            <input id="ratingg" name="rating" type="hidden" value="">
                                                        </div>
                                                        <div class='clearfix'></div>
                                                    </div> --}}

                                            <input required id="ratingg" name="rating" type="hidden" value="">
                                            @if (Session::get('client_id'))
                                                <div class="text-center mt20 col-sm-12">
                                                    <button type="submit" class="btn btn-robot pull-left"
                                                        id="cfsubmit">Submit Review
                                                    </button>
                                                </div>
                                            @else
                                                <div class="col-sm-12">
                                                    <p class="text-danger">Login into your account to write a
                                                        review</p>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                    <div id="contactFormResponse"></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!--3rd tab-->



                <!--related products-->
                <!--<div class="col-md-10">-->


                <!--</div>-->

                <!--related products end-->
                <div class="tab-content">
                    <section class="container shop">
                        <div class="page-bgc related">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="title-box">
                                        <!--<p>Get our</p>-->
                                        <h2 class="title mt0 text-center">Related <b>Products</b></h2>
                                    </div>
                                </div>
                            </div>

                            <!--row-1-->
                            <div class="row">
                                <!--<div class="boxed">-->
                                @foreach ($products as $product)

                                    <input type="hidden" value="{{ $regular_price = $product->product_price }}">
                                    <input type="hidden" value="{{ $discount_taka = (float) $product->discount }}">
                                    <input type="hidden" value="{{ $discount_percent = $product->discount_percent }}">
                                    <input type="hidden"
                                        value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                                    <input type="hidden"
                                        value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">

                                    <div class="col-sm-3">
                                        <div class="shop-box">

                                            @if ($discount_taka == null && $discount_percent != 0)
                                                <div class="product-badge">{{ $discount_percent }}% OFF</div>
                                            @endif

                                            <img class="img-full img-responsive" src="{{ asset($product->product_image) }}"
                                                alt="shop">
                                            <div class="shop-box-hover text-center">
                                                <div class="c-table">
                                                    <div class="c-cell">
                                                        <a
                                                            href="{{ route('product', ['id' => $product->id, 'category_id' => $product->category_id]) }}">
                                                            Show Details
                                                            <!--<span class="ion-ios-information"></span>-->
                                                        </a>
                                                        <input type="hidden" name="id" id="proid-{{ $product->id }}"
                                                            value="{{ $product->id }}" />
                                                        <input type="hidden" name="qty" id="qty-{{ $product->id }}"
                                                            value="1" min="1" />
                                                        <button class="btn btn-robot btn-sm" data-id="{{ $product->id }}"
                                                            type="button" onclick="addToCart(this)">
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
                                                    {{-- <h4>{{$v_product->product_name}}</h4> --}}
                                                    <a
                                                        href="{{ route('product', ['id' => $product->id, 'category_id' => $product->category_id]) }}">
                                                        <h4 style="color: black">{{ $product->product_name }}</h4>
                                                    </a>
                                                    {{-- <h4>MO: <span class="thin">#00SS5</span></h4> --}}
                                                </div>

                                                <div class="col-sm-3">
                                                    <p class="shop-price">
                                                        <input type="hidden"
                                                            value="{{ $regular_price = $product->product_price }}">
                                                        <input type="hidden"
                                                            value="{{ $discount_taka = (float) $product->discount }}">
                                                        <input type="hidden"
                                                            value="{{ $discount_percent = $product->discount_percent }}">
                                                        <input type="hidden"
                                                            value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                                                        <input type="hidden"
                                                            value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">
                                                        @if ($discount_taka != null || $discount_percent != 0)
                                                            <del>৳{{ $product->product_price }}</del>
                                                        @endif

                                                        {{-- <input type="hidden" value="{{$regular_price = $v_product->product_price}}">
                                                            <input type="hidden" value="{{$discount_taka = (float)$v_product->discount}}">
                                                            <input type="hidden" value="{{$discount_percent = $v_product->discount_percent}}">
                                                            <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                                                            <input type="hidden" value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}"> --}}

                                                        @if ($discount_taka != '')
                                                            ৳{{ $discount_price_taka }}
                                                        @else
                                                            ৳{{ $discount_price_percent }}
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
                                    </div>
                                @endforeach


                            </div>
                            <!--row-1-->

                            <!--row-2-->


                            <!--row-2-->

                        </div>
                    </section>
                </div>

            </div>

            <!--tab column-->

            <!--related products-->


            <!--related products end-->


            <div class="col-sm-2 mb-2 shadow-sm">
                <h5> Best Seller</h5>

                @foreach ($bestProducts as $bestProduct)

                    <input type="hidden" value="{{ $regular_price = $bestProduct->product_price }}">
                    <input type="hidden" value="{{ $discount_taka = (float) $bestProduct->discount }}">
                    <input type="hidden" value="{{ $discount_percent = $bestProduct->discount_percent }}">
                    <input type="hidden" value="{{ $discount_price_taka = $regular_price - $discount_taka }}">
                    <input type="hidden"
                        value="{{ $discount_price_percent = ($regular_price * (100 - $discount_percent)) / 100 }}">

                    <div class="best-sellers">
                        <div class="shop-box">

                            @if ($discount_taka == null && $discount_percent != 0)
                                <div class="product-badge">{{ $discount_percent }}% OFF</div>
                            @endif
                            <img class="img-full img-responsive" src="{{ asset($bestProduct->product_image) }}" alt="shop">
                            <div class="shop-box-hover text-center">
                                <div class="c-table">
                                    <div class="c-cell">
                                        <a
                                            href="{{ route('product', ['id' => $bestProduct->id, 'category_id' => $bestProduct->category_id]) }}">
                                            Show Details
                                            <!--<span class="ion-ios-information"></span>-->
                                        </a>
                                        <input type="hidden" id="proid-{{ $bestProduct->id }}"
                                            value="{{ $bestProduct->id }}" name="proid" />
                                        <input type="hidden" name="qty" id="qty-{{ $bestProduct->id }}" value="1" min="1"
                                            name="qty" />
                                        <button class="btn btn-robot btn-sm" data-id="{{ $bestProduct->id }}"
                                            onclick="addToCart(this)" type="button" onclick="addToCart(this)">
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
                                    {{-- <h4>{{$v_product->product_name}}</h4> --}}
                                    <a
                                        href="{{ route('product', ['id' => $product->id, 'category_id' => $product->category_id]) }}">
                                        <h4 style="color: black">{{ $bestProduct->product_name }}</h4>
                                    </a>
                                    {{-- <h4>MO: <span class="thin">#00SS5</span></h4> --}}
                                </div>

                                <div class="col-sm-3">
                                    <p class="shop-price">

                                        @if ($discount_taka != null || $discount_percent != 0)
                                            <del>৳{{ $bestProduct->product_price }}</del>
                                        @endif

                                        {{-- <input type="hidden" value="{{$regular_price = $v_product->product_price}}">
                                            <input type="hidden" value="{{$discount_taka = (float)$v_product->discount}}">
                                            <input type="hidden" value="{{$discount_percent = $v_product->discount_percent}}">
                                            <input type="hidden" value="{{$discount_price_taka = $regular_price-$discount_taka}}">
                                            <input type="hidden" value="{{$discount_price_percent = ($regular_price*(100-$discount_percent))/100}}"> --}}

                                        @if ($discount_taka != '')
                                            ৳{{ $discount_price_taka }}
                                        @else
                                            ৳{{ $discount_price_percent }}
                                        @endif

                                    </p>


                                </div>


                            </div>
                        </div>


                        <!--<div class="shop-box-title">-->
                        <!--    <div class="row">-->
                        <!--        <div class="col-sm-1">-->
                        <!--            <a href="{{ route('product', ['id' => $bestProduct->id, 'category_id' => $bestProduct->category_id]) }}">-->
                        <!--                <h4 style="color: black">{{ $bestProduct->product_name }}</h4></a>-->
                        <!--        </div>-->
                        <!--        <div class="col-sm-3">-->
                        <!--            <p class="shop-price">-->
                        <!--                ৳ {{ $bestProduct->product_price }}-->
                        <!--            </p>-->
                        <!--            <div class="star">-->
                        <!--                <span class="ion-ios-star"></span>-->
                        <!--                <span class="ion-ios-star"></span>-->
                        <!--                <span class="ion-ios-star"></span>-->
                        <!--                <span class="ion-ios-star-half"></span>-->
                        <!--                <span class="ion-ios-star-outline"></span>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                @endforeach
                <!--best-sellers-->


                <!--best-sellers-->


                <!--best-sellers-->
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

    </script>
    <script src="{{ asset('public/client/assets/js/custom/cart.js') }}"></script>
    {{-- <script src="{{asset('client/assets/js/custom/api.js')}}"></script> --}}
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


@endsection
