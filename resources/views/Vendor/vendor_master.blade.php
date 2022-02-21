<!--header-->
@include('Vendor.Header.header')
<!--/header-->


<body id="page-top">

<!--TopNav-->
@include('Vendor.Navbar.navbar')
<!--TopNav-->

<div id="wrapper">

    <!-- Sidebar -->
@include('Vendor.Sidebar.sidebar')
<!--/Sidebar-->

    <div id="content-wrapper">

    @yield('vendor-home')
    <!-- /.container-fluid -->

        <!-- Sticky Footer -->
    @include('Vendor.Footer.footer')
    <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
@include('Vendor.logoutmodal.logoutmodal')
<!--/ Logout Modal-->

<!-- Bootstrap core JavaScript-->
@include('Vendor.Endgame.endgame')

