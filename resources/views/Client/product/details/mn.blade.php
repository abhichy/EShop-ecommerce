
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EShop</title>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">

    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <!-- font awesome -->
    <link href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.theme.min.css" rel="stylesheet">
    <link href="assets/css/ionicons.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
</head>
<body>

<!--navbar-->
<section id="header" class="main-header">
    <div class="container-fluid">

        <nav id="navbar-head-top" class="navbar navbar-expand-lg navbar-light">
            <a href="index.html"><img src="assets/images/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Products
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="sub-category.html">Mobile</a>
                            <a class="dropdown-item" href="sub-category.html">Laptop</a>
                            <a class="dropdown-item" href="sub-category.html">Monitor</a>
                            <a class="dropdown-item" href="sub-category.html">Speaker</a>
                            <a class="dropdown-item" href="sub-category.html">CC Camera</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="feed.html">News Feed</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>



                    <li class="nav-item">
                        <a href="cart.html"><span class="ion-android-cart"> 0 products </span> </a>
                    </li>

                    <li class="nav-item">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success btn-robot my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="ion-log-in login-menu"> &nbsp;Log in </span>
                        </a>

                        <div class="dropdown-menu login" aria-labelledby="navbarDropdown">

                            <div class="card login-form">
                                <div class="card-body">
                                    <!--<h3 class="card-title text-center">Log in</h3>-->
                                    <div class="card-text">
                                        <!--
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                                        <form>
                                            <!-- to error: add class "has-danger" -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>

                                                <input type="password" class="form-control form-control-sm" id="exampleInputPassword1">
                                                <a href="#" style="float:left;font-size:9px;">Forgot password?</a>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>

                                            <div class="sign-up">
                                                Don't have an account? <a href="register.html">Create One</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
        </nav>

        <!-- Navigation -->
        <!--nav ends-->


    </div> <!-- /.container -->
    <div class="nutral"></div>
</section> <!-- /#header -->

<!-- product details section -->
<div class="container">
    <div class="card mb-4">
        <!--<div class="container-fliud">-->
        <div class="wrapper row">
            <div class="preview col-md-4">

                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1"><img src="assets/images/iphone.jpg" /></div>
                    <div class="tab-pane" id="pic-2"><img src="assets/images/iphone.jpg" /></div>
                    <div class="tab-pane" id="pic-3"><img src="assets/images/iphone.jpg" /></div>
                    <div class="tab-pane" id="pic-4"><img src="assets/images/iphone.jpg" /></div>
                    <div class="tab-pane" id="pic-5"><img src="assets/images/iphone.jpg" /></div>
                </div>



                <ul class="preview-thumbnail nav nav-tabs">
                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="assets/images/iphone.jpg"/></a></li>
                    <li><a data-target="#pic-2" data-toggle="tab"><img src="assets/images/iphone.jpg" /></a></li>
                    <li><a data-target="#pic-3" data-toggle="tab"><img src="assets/images/iphone.jpg" /></a></li>
                    <li><a data-target="#pic-4" data-toggle="tab"><img src="assets/images/iphone.jpg" /></a></li>
                    <li><a data-target="#pic-5" data-toggle="tab"><img src="assets/images/iphone.jpg" /></a></li>
                </ul>



            </div>
            <div class="details col-md-4">
                <h4 class="product-details-title mt-4">IPHONE 10</h4>
                <div class="rating">
                    <div class="stars">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <span class="review-no">41 reviews</span>
                </div>
                <p class="product-description">Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                <h5 class="price">current price: <span>180.00 BDT</span></h5>
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
                          <button type="button" class="btn btn-outline-danger btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                              <span class="ion-ios-minus"></span>
                            </button>
                            </span>
                    <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                    <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-success btn-number" data-type="plus" data-field="quant[1]">
                              <span class="ion-ios-plus"></span>
                            </button>
                            </span>
                </div>

                <div class="action mt-3">
                    <a href="cart.html" type="button" class="add-to-cart btn btn-default">ORDER NOW</a>
                    <a href="cart.html" type="button" class="btn btn-outline-default">ADD TO CART</a>
                    <!-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> -->
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
<div class="container product-tab">
    <div class="row">
        <div class="col-md-10">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#review" role="tab" data-toggle="tab">Product Review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#desc" role="tab" data-toggle="tab">Product Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#spec" role="tab" data-toggle="tab">Product Specification</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="review">
                    <div class="review-block">
                        <!--<h2 class="title mt0 text-center mb-5">Customer Review</h2>-->
                        <!--<hr/>-->
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="assets/images/user.jpg" class="img-rounded">
                                <div class="review-block-name"><a href="#">rahat</a></div>
                                <div class="review-block-date">May 01, 2020<br/>1 day ago</div>
                            </div>
                            <div class="col-sm-10">
                                <div class="review-block-rate mb-3">
                                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                </div>
                                <div class="review-block-title">I am loving it.</div>
                                <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="assets/images/user.jpg" class="img-rounded">
                                <div class="review-block-name"><a href="#">rahat</a></div>
                                <div class="review-block-date">May 01, 2020<br/>1 day ago</div>
                            </div>
                            <div class="col-sm-10">
                                <div class="review-block-rate mb-3">
                                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                        <span class="ion-ios-star"></span>
                                    </button>
                                </div>
                                <div class="review-block-title">I am loving it.</div>
                                <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--1st tab-->

                <div role="tabpanel" class="tab-pane fade" id="desc">
                    <div class="review-block">
                        <!--<h2 class="title mt0 text-center mb-5">Customer Review</h2>-->
                        <!--<hr/>-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="review-block-description">
                                    Special <br>
                                    Packing Capacity: 5Kg <br>
                                    Brand: Apple <br>
                                    Good Quality Product
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="review-block-description">
                                    Special <br>
                                    Packing Capacity: 5Kg <br>
                                    Brand: Apple <br>
                                    Good Quality Product
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--2nd tab-->

                <div role="tabpanel" class="tab-pane fade" id="spec">
                    <div class="review-block">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="review-block-description text-center">
                                    Model: KL-202  <br>
                                    Type C USB Dash Data Cable & Adapter <br>
                                    Extremely fast charge speed <br>
                                    60% Charging Capacity in around 30 Minutes <br>
                                    Compact and Tangle-free

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--3rd tab-->
            </div>
        </div>
        <!--tab column-->

        <!--best seller-div-->
        <div class="best-sellers-div col-sm-2">
            <h5> Best Seller</h5>
            <div class="best-sellers">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-2.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">
                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="cart.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>IPHONE 10</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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
            <!--best-sellers-->

            <div class="best-sellers">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-2.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">
                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="cart.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>IPHONE 10</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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
            <!--best-sellers-->
        </div>
        <!--best seller-div ends-->
    </div>
</div>
<!--review and specification tab ends-->





<!-- Shop -->
<section class="container shop">
    <div class="page-bgc related">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box">
                    <!--<p>Get our</p>-->
                    <h2 class="title mt0">Related Products</h2>
                </div>
            </div>
        </div>

        <!--row-1-->
        <div class="row">
            <!--<div class="boxed">-->
            <div class="col-sm-3">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-2.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">

                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="cart.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>IPHONE 10</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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

            <div class="col-sm-3">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-3.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">

                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="product-details.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>Dahua CC</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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

            <div class="col-sm-3">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-3.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">
                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="product-details.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>Dahua CC</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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

            <div class="col-sm-3">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-3.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">
                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="product-details.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>Dahua CC</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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
        </div>
        <!--row-1-->

        <!--row-2-->
        <div class="row">
            <!--<div class="boxed">-->
            <div class="col-sm-3">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-2.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">

                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="cart.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>IPHONE 10</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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

            <div class="col-sm-3">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-3.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">

                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="product-details.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>Dahua CC</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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

            <div class="col-sm-3">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-3.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">
                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="product-details.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>Dahua CC</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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

            <div class="col-sm-3">
                <div class="shop-box">
                    <img class="img-full img-responsive" src="assets/images/shop-3.jpg" alt="shop">
                    <div class="shop-box-hover text-center">
                        <div class="c-table">
                            <div class="c-cell">
                                <a href="product-details.html">
                                    <span class="ion-ios-information"></span>
                                </a>
                                <a href="product-details.html">
                                    <span class="ion-ios-cart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-box-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h4>Dahua CC</h4>
                            <h4>MO: <span class="thin">#00SS5</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <p class="shop-price">
                                $ 747
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
        </div>

        <!--row-2-->

    </div>
</section>



<!-- shop -->



<!-- Footer -->
<section id="footer-widget" class="footer-widget">
    <div class="container-fluid header-bg">
        <div class="row">
            <div class="col-sm-3">
                <h3>Our Popular Products</h3>
                <ul>
                    <li><a href="#">DELL Laptop</a></li>
                    <li><a href="#">LENOVO Notebook</a></li>
                    <li><a href="#">Macbook Air</a></li>
                    <li><a href="#">Awei Speaker</a></li>
                    <li><a href="#">SAMSUNG S7</a></li>
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
                    <li><a href="#">DELL Laptop</a></li>
                    <li><a href="#">LENOVO Notebook</a></li>
                    <li><a href="#">Macbook Air</a></li>
                    <li><a href="#">Awei Speaker</a></li>
                    <li><a href="#">SAMSUNG S7</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h3>Our Services</h3>
                <div class="widget-img-box">
                    <a class="test-popup-link" href="assets/images/widget-big-1.png">
                        <img class="widget-img" src="assets/images/widget-1.png" alt="widget">
                    </a>
                    <a class="test-popup-link" href="assets/images/widget-big-2.png">
                        <img class="widget-img" src="assets/images/widget-2.png" alt="widget">
                    </a>
                    <a class="test-popup-link" href="assets/images/widget-big-3.png">
                        <img class="widget-img" src="assets/images/widget-3.png" alt="widget">
                    </a>
                    <a class="test-popup-link" href="assets/images/widget-big-4.png">
                        <img class="widget-img" src="assets/images/widget-4.png" alt="widget">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer text-center">
    <h3>&copy; Developed by <a href="https://cursorbd.com/">CURSOR LTD</a></h3>
</footer>

<!-- Scripts -->
<script src="assets/js/jquery-1.12.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/script.js"></script>

<script>

    $('.btn-number').click(function(e){
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {

                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>


</body>
</html>
