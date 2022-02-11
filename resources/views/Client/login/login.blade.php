<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EShop</title>

    <!-- favicon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}public/client/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}public/client/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}public/client/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{asset('/')}}public/client/assets/favicon/site.webmanifest">


    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <!-- CSS files -->

    <link href="{{asset('/')}}public/client/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="{{asset('/')}}public/client/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('/')}}public/client/assets/css/owl.carousel.theme.min.css" rel="stylesheet">
    <link href="{{asset('/')}}public/client/assets/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('/')}}public/client/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}public/client/assets/css/main.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<!-- Site Header -->
<div class="site-header-bg login">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('/')}}"></a>

                <br>

            </div>

        </div>
    </div>
</div>

<!-- Header -->


<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h5 style="color: red">{{Session::get('message')}}</h5>
            <h3 class="card-title text-center">Log in</h3>
            <div class="card-text">


                </div>
                <form action="{{route('login-process')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>

                        <a href="#" style="float:right;font-size:12px;">Forgot password?</a>
                        <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Login">

                    <div class="sign-up">
                        Don't have an account? <a href="{{route('client-register')}}">Create One</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- login -->


</body>
</html>
