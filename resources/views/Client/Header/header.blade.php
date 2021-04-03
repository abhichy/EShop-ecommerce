<section id="header" class="main-header">
    <div class="container-fluid" id="autor">

        <nav id="navbar-head-top" class="navbar navbar-expand-lg navbar-light">
            <a href="{{route('/')}}"></a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('/')}}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About Us</a>
                    </li>


                    <!--<li class="nav-item dropdown">-->
                    <!--    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"-->
                    <!--       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--        Products-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                <!--        @foreach($categories as $category)-->
                    <!--            <a class="dropdown-item"-->
                <!--               href="{{ route('category-products',['id'=>$category->id]) }}">{{$category->category_name}}</a>-->
                    <!--        @endforeach-->
                    <!--    </div>-->
                    <!--</li>-->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> Products </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            @foreach($categories as $category)
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle"
                                                                href="{{ route('category-products',['id'=>$category->id]) }}">{{$category->category_name}}</a>


                                    <ul class="dropdown-menu">

                                        @foreach($subCategories as $subCategory)
                                            @if($subCategory->root_id==$category->id)

                                                <li><a class="dropdown-item"
                                                       href="{{ route('sub-category',['id'=>$subCategory->id]) }}">{{$subCategory->category_name}}</a></li>

                                            @endif
                                        @endforeach

                                    </ul>


                                </li>
                            @endforeach


                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> Brands </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu" aria-labelledby="navbarDropdown"> @foreach($brands as $brand)
                                    <a class="dropdown-item"
                                       href="{{ route('brand-product',['id'=>$brand->id]) }}">{{$brand->brand_name}}</a>
                                @endforeach

                            </li>


                        </ul>
                    </li>

                    <!--<li class="nav-item dropdown">-->
                    <!--    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"-->
                    <!--       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--        Brands-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
                <!--        @foreach($brands as $brand)-->
                    <!--            <a class="dropdown-item"-->
                <!--               href="{{ route('brand-product',['id'=>$brand->id]) }}">{{$brand->brand_name}}</a>-->
                    <!--        @endforeach-->
                    <!--    </div>-->
                    <!--</li>-->

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('news-feed')}}">News Feed</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact-us')}}">Contact Us</a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('show-cart')}}"><span
                                class="ion-android-cart cart_qty">{{Cart::content()->count()}}</span> </a>
                    </li>

                    <li class="nav-item">
                        <!--<form class="form-inline">-->
                        <!--    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
                        <!--    <button class="btn btn-outline-success btn-robot my-2 my-sm-0" type="submit">Search</button>-->
                        <!--</form>-->
                        <input class="form-control mr-sm-2 search_key" id="productName" type="search"
                               placeholder="Search" aria-label="Search">
                        <!--<button class="btn btn-outline-success btn-robot my-2 my-sm-0" type="submit">Search</button>-->
                        <div class="container">
                            <div class="row" id="productList">

                            </div>
                        </div>
                    </li>




                    @if(Session::get('client_id'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="ion-log-in login-menu">  {{Session::get('client_name')}}</span>
                            </a>

                            {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('client-logout')}}">logout</a>
                            </div>--}}
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('client-profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{route('order-list')}}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Order List
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('client-logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="ion-log-in login-menu"> &nbsp;log in </span>
                            </a>

                            <div class="dropdown-menu login" aria-labelledby="navbarDropdown">


                                <div class="card login-form">
                                    <div class="card-body">
                                        <!--<h3 class="card-title text-center">Log in</h3>-->
                                        <div class="card-text">
                                            <!--
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                                            <form action="{{route('login-process')}}" method="post">
                                            @csrf
                                            <!-- to error: add class "has-danger" -->
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" name="email"
                                                           class="form-control form-control-sm"
                                                           id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>

                                                    <input type="password" name="password"
                                                           class="form-control form-control-sm"
                                                           id="exampleInputPassword1">
                                                    <a href="#" style="float:left;font-size:9px;">Forgot password?</a>
                                                </div>
                                                <input type="submit" class="btn btn-primary btn-block" value="Login">

                                                <div class="sign-up">
                                                    Don't have an account? <a href="{{route('client-register')}}">Create
                                                        One</a>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>


                        </li>


                </ul>
            </div>
        </nav>

        <!-- Navigation -->
        <!--nav ends-->

    {{--<div class="intro row">
        <div class="overlay"></div>
        <div class="col-6 offset-6 mb-2">
            <a href="login.html" type="button" class="btn btn-light mb-2">Log in</a>
            <a href="register.html" type="button" class="btn btn-primary mb-2">Sign up</a>
        </div>
        <!--
        <div class="col-6 offset-6">
            <button class="btn btn-primary">Sign in</button>
        </div> -->
        <div class="col-6 offset-6">
            <h2 class="header-quote">Save time-to-time</h2>
            <p>
                Your sweeping costs with the
            </p>
            <h1 class="header-title">Gadgetoy<br><span class="thin"></span></h1>
        </div>
    </div>--}} <!-- /.intro.row -->
    </div> <!-- /.container -->
    <div class="nutral"></div>
</section> <!-- /#header -->
<script>
    // $(document).ready(function(){
    // setInterval(function(){
    //       $("#here").load(window.location.href + " #here" );
    // }, 3);
    // });

    // let autorefresh =
    //     setInterval(function(){
    //       $("#autor").load(window.location.href + " #autor" );
    // },8000);


</script>
<script src="{{asset('public/client/assets/js/custom/api.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


