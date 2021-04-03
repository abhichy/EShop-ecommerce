 <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                  <tr>
                    <th style="width: 20px;">No.</th>
                    <th style="width: 300px;">Product Item</th>
                    <th style="width: 300px;">Category</th>
                    <th style="width: 300px;">Vendor</th>
                    {{-- <th style="width: 25px;">Size Color</th> --}}
                    <th style="width: 20px;">Quantity</th>
                    <th style="width: 20px;">Price</th>
                    <th style="width: 20px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                	 @php($i = 1)
                   @foreach($products as $v_product)
                  <tr>
                  <td>{{$i++}}</td>
                  <td>{{$v_product->product_name}}</td>
                  <td>{{$v_product->category->category_name}}</td>
                  <td>{{$v_product->vendor->vendor_name}}</td>
                     {{-- @if($v_product->sc ==1)
                    <td>A/V</td>
                     @else
                    <td>N\A</td>
                     @endif  --}}
                    <td>{{$v_product->product_quantity}}</td>
                    <td>{{$v_product->currency}}{{$v_product->product_price}} </td>

                    <td>
                        <a
                    href="{{route('product-details',['id' =>$v_product->id])}}"
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            Details
                        </a>
                        ||
                            <a
                    href="{{route('edit-product',['id' =>$v_product->id])}}"
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            Edit
                        </a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>