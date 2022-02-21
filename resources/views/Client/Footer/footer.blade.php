<section id="footer-widget" class="footer-widget">
    <div class="container-fluid header-bg">
        <div class="row">
            <div class="col-sm-3">
                <h3>Our Popular Products</h3>
                <ul>

                    @foreach($popularProducts as $product)
                    <li><a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">{{$product->product_name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-3">
                <h3>Important Link</h3>
                <ul>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="#">Ipsum</a></li>
                    <li><a href="#">Dolar</a></li>
                    <li><a href="#">Set amet</a></li>
                    <li><a href="#">Iodiet lorem</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h3>Our Latest Products</h3>
                <ul>
                    @foreach($products as $product)
                    <li><a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">{{$product->product_name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-3">
                <h3>Our Services</h3>
                <div class="widget-img-box">
                    <a class="test-popup-link" href="public/assets/images/widget-big-1.png">
                    <img class="widget-img" src="{{asset('public/client/assets/images/widget-1.png')}}" alt="widget">
                    </a>
                    <a class="test-popup-link" href="public/assets/images/widget-big-2.png">
                        <img class="widget-img" src="{{asset('public/client/assets/images/widget-2.png')}}" alt="widget">
                    </a>
                    <a class="test-popup-link" href="public/assets/images/widget-big-3.png">
                        <img class="widget-img" src="{{asset('public/client/assets/images/widget-3.png')}}" alt="widget">
                    </a>
                    <a class="test-popup-link" href="public/assets/images/widget-big-4.png">
                        <img class="widget-img" src="{{asset('public/client/assets/images/widget-4.png')}}" alt="widget">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer text-center">
