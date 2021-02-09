<!--header-->
@include('Admin.header.header')
<!--/header-->

<body id="page-top">

<!--TopNav-->
@include('Admin.navbar.navbar')
<!--TopNav-->  

  <div id="wrapper">

    <!-- Sidebar -->
      @include('Admin.sidebar.sidebar')
    <!--/Sidebar-->
    <!-- admin home content -->
      @yield('admin-home')
    </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 
  <!-- Logout Modal-->
  @include('Admin.logoutmodal.logoutmodal')
  <!--/ Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  
@include('Admin.endgame.endgame')

<!-- @include('Admin.footer.footer')  -->