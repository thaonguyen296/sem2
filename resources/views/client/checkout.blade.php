@extends('layout')

<!-- ================ start banner area ================= -->

@section('banner')
    <section class="banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center banner">
                    <h1>Product Checkout</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- ================ end banner area ================= -->

<!--================Blog Area =================-->

@section('content')

    <!--================Checkout Area =================-->
    <section class="checkout_area section-margin--small">
        <div class="container">
            <div class="billing_details">
                <form action="{{url('/checkout')}}" method="post" >
                    @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <div id="form-checkout" class="row contact_form"novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" placeholder="Full name" id="first" name="name">
                                <span class="placeholder" data-placeholder="First name" ></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" id="company" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" value="{{ Auth::user()->phonenumber }}" placeholder="Phone Number" id="number" name="number">
                                <span class="placeholder" data-placeholder="Phone number"></span>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="address" value="{{ Auth::user()->address }}" name="address" placeholder="Postcode/ZIP">
                            </div>
                            <div class="col-md-12 form-group mb-0">
{{--                                <div class="creat_account">--}}
{{--                                    <h3>Shipping Details</h3>--}}
{{--                                    <input type="checkbox" id="f-option3" name="selector">--}}
{{--                                    <label for="f-option3">Ship to a different address?</label>--}}
{{--                                </div>--}}
                                <textarea class="form-control" name="note" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">
                                        <h4>Product <span>Total</span></h4>
                                    </a>
                                </li>
                                @foreach($_SESSION['cart'] as $cart)
                                    <li><a href="#">{{$cart['name']}}<span class="middle">x {{$cart['number']}}</span> <span class="last">${{$cart['price'] * $cart['number']}}</span></a></li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Subtotal
                                        <span>
                                            $
                                            @php
                                                $subtotal = 0;
                                            foreach ($_SESSION['cart'] as $cart) {
                                                    $subtotal += $cart['number'] * $cart['price'];
                                                }
                                                echo $subtotal;
                                            @endphp
                                        </span>
                                    </a>
                                </li>
                                <li><a href="#">Shipping <span>Flat rate: $1.00</span></a></li>
                                <li><a href="#">Total <span>$@php echo $subtotal+1 @endphp</span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" value="1" name="payment">
                                    <label for="f-option5">Banking</label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" value="0" name="payment">
                                    <label for="f-option6">COD </label>
                                    <div class="check"></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                </p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" value="1" name="payment">
                                <label for="f-option4">I’ve read and accept the </label>
                                <a href="#">terms & conditions*</a>
                            </div>
                            <div class="text-center">
                                <button class="button button-paypal">
                                    Proceed to Paypal</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection

<!--================End Blog Area =================-->

