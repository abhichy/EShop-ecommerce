<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Abhi Chowdhury</title>

    <!-- favicon -->
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}client/assets/vendor/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}client/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}client/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}client/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{asset('/')}}client/assets/favicon/site.webmanifest">
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="{{asset('client/assets/js/custom/cart.js')}}"></script>
    <script src="{{asset('client/assets/js/custom/search.js')}}"></script>

    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <!-- CSS files -->

    <link href="{{asset('/')}}client/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/owl.carousel.theme.min.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/main.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}client/assets/rating.css" rel="stylesheet">
    <!--<script src="{{ asset('') }}js/app.js"></script>-->

    <style>
        .ui-autocomplete {
            position: fixed;
            top: 100%;
            left: 0;
            z-index: 1051 !important;
            float: left;
            display: none;
            min-width: 160px;
            width: 160px;
            padding: 5px;
            margin: 2px 0 0 0;
            list-style: none;
            background-color: #ffffff;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
            cursor: pointer;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    <![endif]-->
</head>

<body>

    <!--Header-->
    @include('Client.Header.header')


    <!-- trending Product -->

    {{--@include('Client.Slider.slider')--}}

    <!-- products -->

    {{-- home content --}}
    @yield('home-content')



    <!-- Footer -->
    @include('Client.Footer.footer')
    <p>&copy; Developed by <a>App Incubator</a></p>
    </footer>
    <!-- Scripts -->

    <script src="{{asset('/')}}client/assets/rating.js"></script>
    <script src="{{asset('client/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('client/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('client/assets/js/script.js')}}"></script>

</body>

</html>