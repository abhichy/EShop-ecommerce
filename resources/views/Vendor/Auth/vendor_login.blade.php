<!--header-->
@include('Vendor.Header.header')
<!--/header-->

<body class="bg-dark" id="">



<div class="container">


<h2 style="color:red" align='center'><i>{{Session::get('message')}}</i></h2>


  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Vendor Login</div>
    <div class="card-body">
    <form method="POST" action="{{route('vendor-new-login')}}">
      @csrf
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputEmail" name="email" class="form-control" value="" placeholder="Email address" required="required" autofocus="autofocus">
            <label for="inputEmail">Email address</label>
            <small class="text-danger"></small>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword"  class="form-control" placeholder="Password" required="required" name="password">
            <label for="inputPassword">Password</label>
            <small class="text-danger"></small>
          </div>
        </div>

        <button class="btn btn-primary" value="submit">Login</button>
      </form>
      <div class="text-center">
      <a class="d-block small mt-3" href="{{route('vendor-register')}}">Register An Account</a>
        <a class="d-block small" href="">Forgot Password?</a>
      </div>
    </div>
  </div>
</div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('Vendor.logoutmodal.logoutmodal')
  <!--/ Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  @include('Vendor.Endgame.endgame')

