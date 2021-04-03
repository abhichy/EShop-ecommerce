
    <div class="row" >
        <!--<div class="boxed">-->
        @foreach($filter as $product)
        <div class="col-sm-3">
            <div class="shop-box">
                <div class="product-badge">10% OFF</div>
                <img class="img-full img-responsive" src="{{asset($product->product_image)}}" alt="shop">
                <div class="shop-box-hover text-center">
                    <div class="c-table">
                        <div class="c-cell">
                            <h4>{{$product->product_name}}</h4>
                          
                            <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                <span class="ion-ios-information"></span>
                            </a>
                            <input type="hidden" id="proid-{{$product->id}}" name="proid" value="{{$product->id}}">
                            <input type="hidden" id="qty-{{$product->id}}" name="qty" value="1" value="min">
                            <button data-id="{{$product->id}}" onclick="addToCart(this)">
                                <span class="ion-ios-cart"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shop-box-title">
                <div class="row">
                    <div class="col-sm-3">
                        <h4>{{$product->product_name}}</h4>
                    </div>
                    <div class="col-sm-3">

                        <p class="shop-price">
                            ${{$product->product_price}}
                        </p>
                        <div class="star">
                            <span class="ion-ios-star"></span>
                            <span class="ion-ios-star"></span>
                            <span class="ion-ios-star"></span>
                            <span class="ion-ios-star-half"></span>
                            <span class="ion-ios-star-outline"></span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        @endforeach

    </div>

 




