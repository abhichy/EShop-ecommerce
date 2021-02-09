@extends('Client.master')

@section('home-content')
    <section class="contact client-profile">
        <h3 class="text-success text-center">{{Session::get('message')}}</h3>
        <div class="container page-bgc">

            <div class="row">

                <!--profile view with img-->
                <div class="col-6 col-sm-6 shadow border border-warning">
                    <div class="content">
                        <div class="row profile text-center">
                            <div class="col-12 col-md-12">
                                <div class="profile-sidebar">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic mt-4">
                                        <img src="{{asset('/')}}public/client/assets/images/user.jpg" alt="my_img">
                                    </div>

                                    <div class="profile-usertitle ">
                                        <div class="profile-usertitle-name">
                                            {{Session::get('client_name')}}
                                        </div>


                                        <button type="submit" class="btn btn-robot mt-4" id="update">Edit Profile
                                        </button>
                                    </div>


                                    <!-- END SIDEBAR BUTTONS -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--profile view with img ends-->


                <!--Data input form-->
                <div class="user-data col-6 col-sm-6 shadow border border-warning">
                    <h4 class="text-center">Please Fill Up The Form</h4>
                    <form action="{{route('client-update-profile')}}" class="contact-form" id="contactForm"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{Session::get('client_id')}}">
                                    <input type="text" class="form-control" placeholder="First Name*" id="fname"
                                           name="first_name" value="{{Session::get('client_first_name')}}" required>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" id="lname"
                                           name="last_name" value="{{Session::get('client_last_name')}}">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email*" id="psdd"
                                           name="email" value="{{Session::get('client_email')}}">
                                </div> <!-- /.form-group -->
                            </div>



                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password*" id="psdd"
                                           name="password" value="{{Session::get('client_password')}}">
                                </div> <!-- /.form-group -->
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Present Address*" id="psdd"
                                           name="present_address" value="{{Session::get('client_present_address')}}">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Permanent Address*" id="prdd"
                                           name="permanent_address"
                                           value="{{Session::get('client_permanent_address')}}">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->

                            <!-- /.col-sm-6 -->
                            <!-- /.col-sm-6 -->

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="NID Number*" id="nid"
                                           name="nid" value="{{Session::get('client_nid')}}">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->

                            <div class="text-center mt20 col-sm-12">
                                <button type="submit" class="btn btn-robot">Update Profile</button>
                            </div>
                        </div>
                    </form>
                    <div id="contactFormResponse"></div>
                </div>  <!--Data input form-->
                <!-- /.col-sm-6 -->

            </div>

        </div>
        <!--</div>-->
    </section>
@endsection
