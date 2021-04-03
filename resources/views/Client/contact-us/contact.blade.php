@extends('Client.master')

@section('home-content')
    <section class="contact">
        <div class="container page-bgc">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box">
                        <h3 class="text-center text-success mb-2">{{Session::get('message')}}</h3>
                        <p>Get In Touch</p>
                        <h2 class="title mt0">With Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="boxed">
                    <div class="col-sm-12">
                        <p class="inner-p">
                            Lorem ipsum dolor sit amet event landing template, consectetur adipisicing elit. Suscipit
                            corrupti facilis event landing template, enim earum numquam minus veritatis nobis accusamus
                            similique.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">
                <!--<div class="boxed">-->
                <div class="col-sm-8">
                    <h4>Message for us</h4>
                    <form action="{{route('contact-submit')}}" class="contact-form" id="contactForm" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name*" id="fname"
                                           name="first_name" required>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" id="lname"
                                           name="last_name">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email*" id="email"
                                           name="email" required>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number" id="phone"
                                           name="phone">
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-6 -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Write something..."
                                              name="message"></textarea>
                                </div> <!-- /.form-group -->
                            </div> <!-- /.col-sm-12 -->
                            <div class="text-center mt20 col-sm-12">
                                <button type="submit" class="btn btn-robot pull-left" id="cfsubmit">Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="contactFormResponse"></div>
                </div> <!-- /.col-sm-8 -->

                <div class="col-sm-4">
                    <h4>Contact details</h4>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}public/client/assets/images/address.png"
                                 alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Address</h5>
                            <p class="contact-detail">
                                 Bashundhara D Block,<br>
                                Dhaka, Bangladesh
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}public/client/assets/images/phone.png"
                                 alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Phone</h5>
                            <p class="contact-detail">
                                01818 010902<br>
                                01812 351155
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <img class="imgresponsive" src="{{asset('/')}}public/client/assets/images/support.png" alt="con">
                        </div>
                        <div class="col-xs-9">
                            <h5>Support</h5>
                            <p class="contact-detail">
                                abhi.chy.06@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--</div>-->
    </section>
@endsection
