<!--header-->
@include('Admin.header.header')
<!--/header-->

<body class="bg-dark" id="">



<div class="container">


<h2 style="color:red" align='center'><i></i></h2>


  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Admin Login</div>
    <div class="card-body">
    <form method="POST" action="{{route('login')}}">
      @csrf
        <div class="form-group">
          <div class="form-label-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your valid email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <button class="btn btn-primary" value="submit">Login</button>
      </form>
      <div class="text-center">
        <a class="d-block small" href="">Forgot Password?</a>
      </div>
    </div>
  </div>
</div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


