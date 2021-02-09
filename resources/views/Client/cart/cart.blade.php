@extends('Client.master')
@section('home-content')

    <!-- cart -->

    <div class="container shadow cart">


        <div class="container-fluid cart-step mb-4">
            <!--<h1 class="text-center mt-4 mb-4"> Checkout Here</h1>-->
            <div id="multisteps" class="multisteps-form">
                <!--progress bar-->
                <div class="row">
                    <div class="col-12 col-lg-8 ml-auto mr-auto mt-4 mb-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">User Info</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Order Info">Order Info</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Comments">Comments        </button>
                        </div>
                    </div>
                </div>
                <!--form panels-->
                <div class="row">
                    <div class="col-12 m-auto">
                        <!--form replaced with div-->
                        <div class="multisteps-form__form">
                            <!--single form panel - cart panel-->

                            <div class="multisteps-form__panel p-4 rounded bg-white js-active" data-animation="scaleIn" id="here">
                                {{--<h3 class="text-danger">{{Session::get('message')}}</h3>--}}
                                <h3 class="text-center">EShop CART</h3>
                                <!--<p class="text-center lead mb-4">Search Through 1000+ Gadgets, Book Your Desired Product. Get Delivered. </p>-->
                                <h4 style="color:red" align='center'>{{Session::get('message')}}</h4>
                                <table id="cart" class="table table-hover table-condensed mb-4 text-center" >
                                    <thead>
                                    <tr class="h5">
                                        <th class="text-left" style="width:50%">Product</th>
                                        <th style="width:10%">Price</th>
                                        <th nowrap >Quantity</th>
                                        <th style="width:22%" class="text-center">SubTotal</th>
                                        <th style="width:8%">Discount</th>
                                        <th style="width:8%">After Discount</th>

                                        <th style="width:10%"></th>
                                    </tr>
                                    </thead>
                                    @php($sum = 0)
                                    @php($tot = 0)
                                    @php($totalPrice = 0)
                                    @foreach ($cart as $v_cart)
                                        <tbody>
                                        <tr class="tr-{{$v_cart->rowId}}">
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-4 hidden-xs"><img src="{{$v_cart->options->image}}" alt="..." class="img-responsive"/></div>
                                                    <div class="col-sm-8">
                                                        <h5 class="text-left">{{$v_cart->name}}</h5>

                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">{{$v_cart->price}} BDT</td>
                                            <td nowrap style="width: 20%;">
                                                <div class="row">
                                                     <div class='col-sm-3'>
                                                         <button data-id="{{$v_cart->rowId}}" class="btn btn-info btn-sm btn_loading" type="button" id="increase" onclick="increaseValue(this)">
                                                             <i class="fas fa-plus"></i>
                                                             <span class="cart_loading"></span>
                                                         </button>
                                                    </div>
                                                    <div class='col-sm-6'>
                                                        <input type="number" class="form-control text-center" id="qty-{{$v_cart->rowId}}" name="qty" value="{{$v_cart->qty}}">
                                                        <input type="hidden" class="form-control text-center" id="rowId-{{$v_cart->rowId}}" name="rowId" value="{{$v_cart->rowId}}">
                                                        {{-- <input type="submit" class="btn btn-primary" value="update" id="myButton" onclick="updateCart(this)" name="btn"> --}}
                                                    </div>
                                                    <div class='col-sm-3'>
                                                        <button data-id="{{$v_cart->rowId}}" class="btn btn-info btn-sm btn_loading" type="button" id="decrease" onclick="decreaseValue(this)" >
                                                            <i class="fas fa-minus"></i>
                                                            <span class="cart_loading"></span>
                                                        </button>
                                                     </div>
                                                <!--<a href="{{route('delete-cart',['id' => $v_cart->rowId ])}}"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>-->
                                                </div>

                                            </td>
                                            <td data-th="Subtotal" id="subtotal" class="text-center amount-<?php echo $v_cart->rowId ?>">{{$tot = $v_cart->price * $v_cart->qty }}BDT</td>
                                                <input type="hidden" value="{{$discount_taka = $v_cart->options->discount}}">
                                                <input type="hidden" value="{{$percent = $v_cart->options->percent}}">
                                                @if($discount_taka!='' && $discount_taka!=0)
                                                    <td data-th="Subtotal" class="text-center discount-<?php echo $v_cart->rowId ?>">{{$discount_taka=($v_cart->options->discount * $v_cart->qty)}}BDT</td>
                                                @else
                                                    <td data-th="Subtotal" class="text-center">{{$percent}}%</td>
                                                @endif
                                                @if($discount_taka!='' && $discount_taka!=0)
                                                    <td data-th="Subtotal" class="text-center sub_amount-<?php echo $v_cart->rowId ?>">{{$total = $tot-$discount_taka}}</td>
                                                    <input type="hidden" value="{{$totalPrice = $totalPrice+ $total}}" />
                                                @else
                                                    <td data-th="Subtotal" class="text-center sub_amount-<?php echo $v_cart->rowId ?>">{{$total = ($tot*(100-$percent))/100}}</td>
                                                    <input type="hidden" value="{{$totalPrice = $totalPrice+ $total}}">
                                                @endif
                                                {{--<td data-th="Subtotal" class="text-center">{{($total = $tot*(100-$percent))/100}}</td>--}}
                                            <td class="actions" data-th="">
                                                <button data-id="{{$v_cart->rowId}}" type="button" class="btn btn-danger btn-sm btn_loading" onclick="deleteCart(this)">
                                                    <i class="fa fa-trash"></i>
                                                    <span class="cart_loading"></span>
                                                </button>

                                                <!--<a href="{{route('delete-cart',['id' => $v_cart->rowId ])}}"  class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>-->


                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                    <input type="hidden" value="{{$totalPrice}}">
                                    {{-- <tbody>
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-4 hidden-xs"><img src="assets/images/iphone.jpg" alt="..." class="img-responsive"/></div>
                                                    <div class="col-sm-8">
                                                        <h5 class="float-left text-left">Macbook Air</h5>
                                                        <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">50,000.00 BDT</td>
                                            <td data-th="Quantity">
                                                <input type="number" class="form-control text-center" value="1">
                                            </td>
                                            <td data-th="Subtotal" class="text-center">50,000.00 BDT</td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    </tbody> --}}

                                    <tfoot>
                                    <!--<tr class="visible-xs">-->
                                    <!--    <td class="text-center"><strong>Total 50,000.00 BDT</strong></td>-->
                                    <!--</tr>-->
                                    <tr>
                                    <!--<td><a href="{{route('/')}}" class="btn btn-warning text-white"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>-->

                                    <td colspan="5" class="hidden-xs"></td>
                                        <?php
                                        // $sum = $sum + $total;
                                        ?>
                                        {{-- <td  class="hidden-xs text-center"><strong>item total{{$sum}}BDT</strong></td> --}}
                                        {{-- {{$vat = 0}} --}}
                                        <br/>
                                        {{-- <td class="hidden-xs text-center"><strong>garnd total{{$ordertotal = $sum+$vat}}BDT</strong></td> --}}
                                        {{-- <td  class="hidden-xs text-center"><strong>Discount-{{Cart::discount()}}BDT</strong></td> --}}
                                    </br>

                                        <?php
                                        //$discount = 0;
                                        //$ordertotal = Cart::priceTotal();
                                        $ordertotal = $totalPrice;
                                        ?>


                                        @if(Session::get('discount'))
                                        <td class="hidden-xs text-center"><strong>Discount-{{Session::get('discount')}} BDT</strong></td>
                                        @endif


                                        @if(Session::get('totalAfterDiscount'))
                                            <td class="hidden-xs text-center">
                                                <strong>Before-<span class="final_amount_before">{{$ordertotal}}</span>BDT</strong>
                                            </td>
                                            <td class="hidden-xs text-center">
                                                <strong>After-<span class="final_amount_after">{{Session::get('totalAfterDiscount')}}</span>BDT</strong>
                                            </td>
                                        @else
                                            <td colspan="2" class="hidden-xs text-center">
                                                <strong>Total-<span class="final_amount_before">{{$ordertotal}}</span>BDT</strong>
                                            </td>

                                    @endif


                                    {{-- <td class="hidden-xs text-center"><strong>garnd total{{$ordertotal = $sum+$vat}}BDT</strong></td> --}}
                                    <?php
                                    //Session::put('discount',$discount);
                                    Session::put('ordertotal',$ordertotal);
                                    ?>
                                    <!--<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>-->
                                    </tr>

                                    </tfoot>

                                </table>

                                @if(!Session::get('totalAfterDiscount'))
                                <form action="{{route('coupon-check')}}" method="post" class="coupon-form">
                                    <div class="d-flex mt-4">

                                        @csrf
                                        <input required="" class="form-control col-3 mr-2 text-center" name="code" type="text" placeholder="Coupon Code">
                                        <input type="submit" class="btn btn-primary" value="submit">

                                    </div>
                                </form>

                                    @endif


                                {{--<div class="row">
                                    <button>hlo</button>
                                </div>--}}

                                <div class="button-row d-flex mt-4 mb-4">
                                    <a href="http://gadgetoy.com/ecommerce" class="btn btn-warning text-white"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                                    <a href="#multisteps" class="btn btn-primary ml-auto js-btn-next"  type="button" title="Next">Next</a>
                                </div>
                            </div>

                            <!--cart panel ends-->
                            @if(Session::get('client_id'))
                            {{-- </form----------------> --}}
                            <!--single form panel shipping details panel-->
                            <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title text-center">Shipping Details</h3>
                                 <input type="checkbox" name="vehicle1" id="clientInfo" value="Bike">
                                <label for="vehicle1" style="color: red; font-size:140%;" >Auto Fill up form</label><br>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                        <div class="col-md-6 form-group">

                                            <input type="text" class="form-control"  name="first_name" id="firstname" placeholder="First Name">
                                            <div class="invalid-feedback">
                                                Valid first name is required.
                                            </div>
                                        </div>

                                        <div class="col-md-6 form-group">

                                            <input type="text" class="form-control" name="last_name" id="lastname" placeholder="Last Name">
                                            <div class="invalid-feedback">
                                                Valid last name is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" >
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <input class="multisteps-form__input form-control" id="txt_cart_address" name="address" type="text" placeholder="city"/>
                                            <input class="multisteps-form__input form-control" id="status" name="status" value="1" type="hidden"/>

                                        </div>
                                    </div>
                                </br>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="multisteps-form__input form-control"   id="phonenumber" name="phone_number" type="text" placeholder="phone number"/>

                                        </div>
                                    </div>
                                </br>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="multisteps-form__input form-control"  id="postcode" name="post_code" type="text" placeholder="postal code"/>

                                        </div>
                                    </div>



                                    <div class="button-row d-flex mt-4">
                                        <a href="#multisteps" class="btn btn-primary js-btn-prev text-white" type="button" title="Prev">Prev</a>
                                        <a href="#multisteps" class="btn btn-primary ml-auto js-btn-next text-white" type="button" title="Next">Next</a>
                                    </div>


                                    <div class="form-check mt-4">
                                        <input type="checkbox" class="form-check-input" id="same-adress">
                                        Save this information for next time
                                        <label for="same-adress" class="form-check-label"></label>
                                    </div>

                                </div>
                            </div>
                            <!--shipping details panel ends-->


                            <!--single form panel payment method panel-->
                            <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title text-center">Payment Method</h3>
                                <div class="multisteps-form__content">
                                    <div class="row">
                                        <form>
                                        <div class="col-12 mt-4 div_payment_radio">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input payment_type" value="1" id="credit" name="payment_type" checked >
                                                <label for="credit" class="form-check-label">Credit Card</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="radio" class="form-check-input payment_type" value='2' id="debit" name="payment_type" >
                                                <label for="debit" class="form-check-label">Debit Card</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="radio" class="form-check-input payment_type" value="3" id="paypal" name="payment_type"  >
                                                <label for="paypal" class="form-check-label">PayPal</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="radio" class="form-check-input payment_type"  value="4" id="bkash" name="payment_type"  >
                                                <label for="bkash" class="form-check-label">Bkash</label>
                                            </div>
                                        </form>
                                            <div class="row mt-4">
                                                <div class="col-md-6 form-group">
                                                    <label for="card-name">Name on card</label>
                                                    <input type="text" class="form-control" name="card_name" id="card-name" placeholder >
                                                    <div class="invalid-feedback">
                                                        Name on card is required
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label for="card-no">Card Number</label>
                                                    <input type="text" class="form-control" name="card_number" id="card-no" placeholder >
                                                    <div class="invalid-feedback">
                                                        Credit card number is required
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 form-group">
                                                    <label for="expiration">Expire Date</label>
                                                    <input type="text" class="form-control" name="expireDate" id="expireDate" placeholder >
                                                    <div class="invalid-feedback">
                                                        Expiration date required
                                                    </div>
                                                </div>


                                                <div class="col-md-6 form-group">
                                                    <label for="ccv-no">Security Number</label>
                                                    <input type="text" class="form-control" name="security_number" id="sec-no" placeholder >
                                                    <div class="invalid-feedback">
                                                        Security code required
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="button-row d-flex mt-4 col-12">
                                            <a href="#multisteps" class="btn btn-primary js-btn-prev text-white" type="button" title="Prev">Prev</a>

                                            <a class="btn btn-primary ml-auto js-btn-next text-white" type="button" title="Next">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--payment method panel ends-->

                            <!--single form panel additional comments-->
                            <div class="multisteps-form__panel p-4 rounded bg-white" data-animation="scaleIn">
                                <h3 class="multisteps-form__title">Additional Comments</h3>
                                <div class="multisteps-form__content">
                                    <div class="form-row mt-4">
                                        <textarea class="multisteps-form__textarea form-control" id="comment" name="comment" placeholder="Additional Comments and Requirements"></textarea>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>

                                        <button class="btn btn-success btn-robot ml-auto" onclick="orderCheckout(this)" type="button" title="Send">Checkout</button>

                                    </div>
                                </div>
                            </div>
                            <!--additional comments panel ends-->
                            @else
                           <div align="center" >
                            <h2> YOU HAVE TO LOG IN FIRST FOR CONTINUE SHOPPING </h2>
                            <a  href="{{route('client-login')}}">Sign in</a>
                            OR
                            <a  href="{{route('client-register')}}">Sign up</a>
                           </div>

                            @endif

                    </div>
            </div>
                </div>
            </div>
            <!--checkout stepper ends-->
        </div>
    </div>
    <!--container cart-->


    <script>
        //DOM elements
        const DOMstrings = {
            stepsBtnClass: 'multisteps-form__progress-btn',
            stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
            stepsBar: document.querySelector('.multisteps-form__progress'),
            stepsForm: document.querySelector('.multisteps-form__form'),
            stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
            stepFormPanelClass: 'multisteps-form__panel',
            stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
            stepPrevBtnClass: 'js-btn-prev',
            stepNextBtnClass: 'js-btn-next' };
        //remove class from a set of items
        const removeClasses = (elemSet, className) => {
            elemSet.forEach(elem => {
                elem.classList.remove(className);
            });
        };
        //return exect parent node of the element
        const findParent = (elem, parentClass) => {
            let currentNode = elem;
            while (!currentNode.classList.contains(parentClass)) {
                currentNode = currentNode.parentNode;
            }
            return currentNode;
        };
        //get active button step number
        const getActiveStep = elem => {
            return Array.from(DOMstrings.stepsBtns).indexOf(elem);
        };
        //set all steps before clicked (and clicked too) to active
        const setActiveStep = activeStepNum => {
            //remove active state from all the state
            removeClasses(DOMstrings.stepsBtns, 'js-active');
            //set picked items to active
            DOMstrings.stepsBtns.forEach((elem, index) => {
                if (index <= activeStepNum) {
                    elem.classList.add('js-active');
                }
            });
        };
        //get active panel
        const getActivePanel = () => {
            let activePanel;
            DOMstrings.stepFormPanels.forEach(elem => {
                if (elem.classList.contains('js-active')) {
                    activePanel = elem;
                }
            });
            return activePanel;
        };
        //open active panel (and close unactive panels)
        const setActivePanel = activePanelNum => {
            //remove active class from all the panels
            removeClasses(DOMstrings.stepFormPanels, 'js-active');
            //show active panel
            DOMstrings.stepFormPanels.forEach((elem, index) => {
                if (index === activePanelNum) {
                    elem.classList.add('js-active');
                    setFormHeight(elem);
                }
            });
        };
        //set form height equal to current panel height
        const formHeight = activePanel => {
            const activePanelHeight = activePanel.offsetHeight;
            DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;
        };
        const setFormHeight = () => {
            const activePanel = getActivePanel();
            formHeight(activePanel);
        };
        //STEPS BAR CLICK FUNCTION
        /*   DOMstrings.stepsBar.addEventListener('click', e => {
               //check if click target is a step button
               const eventTarget = e.target;
               if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
                   return;
               }
               //get active button step number
               const activeStep = getActiveStep(eventTarget);
               //set all steps before clicked (and clicked too) to active
               setActiveStep(activeStep);
               //open active panel
               setActivePanel(activeStep);

       });*/
        //PREV/NEXT BTNS CLICK
        DOMstrings.stepsForm.addEventListener('click', e => {
            const eventTarget = e.target;
            //check if we clicked on `PREV` or NEXT` buttons
            if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
            {
                return;
            }
            //find active panel
            const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);
            let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);
            isValidStep(activePanelNum,eventTarget,DOMstrings);
            //alert(activePanelNum);
            //set active step and active panel onclick

        });
        //SE    TTING PROPER FORM HEIGHT ONLOAD
        window.addEventListener('load', setFormHeight, false);
        //SETTING PROPER FORM HEIGHT ONRESIZE
        window.addEventListener('resize', setFormHeight, false);
    </script>
    <script src="{{asset('public/client/assets/js/custom/cart.js')}}"></script>
    <script src="{{asset('public/client/assets/js/custom/api.js')}}"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


@endsection
