    <div class="table-responsive">
    <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
        <thead class="">
        <tr>
            <th >No.</th>
            <th >Customer Name</th>
            <th >Contact No</th>
            <th >Order ID</th>
            <th >Total Cost</th>
            <th >Shipping Address</th>
            {{-- <th style="width: 20px;">Price</th> --}}
            <th >Action</th>
        </tr>
        </thead>
        <tbody>
        @php($i = 1)
        @foreach($orders as $v_orders)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$v_orders->full_name}}</td>
                <td>{{$v_orders->contact_no}}</td>
                <td>{{$v_orders->id}}</td>
                <td>{{$v_orders->total_cost}}</td>
                <td>{{$v_orders->address}}</td>
                {{--@if($v_orders->delivery_status == 1)
                    <td><span style="color:black"><b>pending</b></span></td>
                @elseif($v_orders->delivery_status == 3)
                    <td><span style="color:red">cancelled</span></td>
                @elseif($v_orders->delivery_status == 2)
                    <td><span style="color:orange"> processing</span></td>
                @else
                    <td><span style="color:green">delivered</span></td>
                @endif--}}
                <td>
                    <a href="{{route('admin-manage-order-details',['id'=>$v_orders->id])}}"
                        class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                        Details
                    </a>
                    {{--<a
                        href="{{route('admin-delete-order',['id'=>$v_orders->id])}}"
                        class="ml-2 btn btn-sm btn-danger border-0" style="border-radius: 12px;">
                        Delete
                    </a>--}}

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>