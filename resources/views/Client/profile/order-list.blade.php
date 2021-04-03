@extends('Client.master')

@section('home-content')
    <div class="mt-5 container px-0 h-100 mb-4 order-list">
        <div class="row collapse show d-flex h-100 position-relative shadow">


            <!--sidebar with table-->


            {{--<div class="col-3 p-3 page-bgc border-right">
                <!-- fixed sidebar -->
                <h4 class="text-center">Orders</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" > <a href="#" class="text-dark"> All </a> </th>

                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <th scope="row"> <a href="{{route('order-list2',['id'=> 1 ])}}" style="color: orange"> Pending </a></th>



                    </tr>
                    <tr>
                        <th scope="row"> <a href="{{route('order-list2',['id'=> 2])}}" style="color: black"> Processing </a></th>

                    </tr>

                    <tr>
                        <th scope="row"> <a href="{{route('order-list2',['id'=> 5])}}" class="text-success"> Delivered </a></th>
                    </tr>

                    <tr>
                        <th scope="row"> <a href="{{route('order-list2',['id'=> 3])}}" style="color: red"> Cancelled </a></th>
                    </tr>



                    </tbody>
                </table>
                <!-- Searched Item bar -->
            </div>--}}


            <div class="container mt-5">
                <table class="table">
                    <th><a href="{{route('order-list2',['id'=> 1 ])}}" style="color: orange"> Pending </a><span class="badge badge-secondary">{{$pendingTotal}}</span></th>
                    <th><a href="{{route('order-list2',['id'=> 2])}}" style="color: black"> Processing </a><span class="badge badge-secondary">{{$processingTotal}}</span></th>
                    <th><a href="{{route('order-list2',['id'=> 5])}}" class="text-success"> Delivered </a><span class="badge badge-secondary">{{$deliveredTotal}}</span></th>
                    <th><a href="{{route('order-list2',['id'=> 3])}}" style="color: red"> Cancelled </a><span class="badge badge-secondary">{{$cancelledTotal}}</span></th>
                </table>
            </div>


            <!--sidebar with table ends-->



            <!--table starts-->
            <div class="col p-3 page-bgc">
                <h4 class="text-center">Order List</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Date</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$order->created_at}}</td>
                        <td>Cash On Delivery</td>
                        <td>{{$order->total_cost}}</td>
                        <td><a href="{{route('order-details',['id'=>$order->id])}}" type="button" class="btn btn-warning">See Details</a></td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
                <div id="contactFormResponse"></div>
            </div> <!-- table ends -->
            <!-- /.col-sm-8 -->

            <!--</div>-->

        </div>
    </div>
@endsection
