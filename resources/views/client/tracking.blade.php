@extends('layout')

<!-- ================ start banner area ================= -->

@section('banner')
    <!-- ================ start banner area ================= -->
    <section class="banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center banner">
                    <h1>Shipment Track</h1>
{{--                    <nav aria-label="breadcrumb" class="banner-breadcrumb">--}}
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->
@endsection
<!--================Start Content Area =================-->
@section('content')

    <!--================Tracking Box Area =================-->
    <section class="tracking_box_area section-margin--small">
        <div class="container">

            <div class="content-track">
{{--                <div class="content1">--}}
{{--                    <h2>Order Tracking: Order No</h2>--}}
{{--                </div>--}}
                <div class="content2">
                    <div class="content2-header1">
                        <p>Code orders : <span>#{{$track->order->code}}</span></p>
                    </div>
                    <div class="content2-header1">
                        <p>Status : <span>Checking Quality</span></p>
                    </div>
                    <div class="content2-header1">
                        <p>Expected Date : <span>{{$track->order->created_at->modify('+ 7 day')->format('d-m-Y')}}</span></p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="content3">
                    <div class="shipment">
                        <div class="confirm">
                            <div class="imgcircle" @if($track->status > 0) style="background-color:#98D091;" @elseif($track->status == 0) style="background-color:#98D091;"@endif>
                                <img src="{{URL::asset('images/confirm.png')}}" alt="confirm order">
                            </div>
                            <span class="line" @if($track->status > 0) style="background-color:#98D091;" @elseif($track->status == 0) style="background: #98D091 "@endif></span>
                            <p>Confirmed Order</p>
                        </div>
                        <div class="process">
                            <div class="imgcircle" @if($track->status > 1) style="background-color:#98D091;" @elseif($track->status == 1) style="background: #98D091 "@endif>
                                <img src="{{URL::asset('images/process.png')}}" alt="process order">
                            </div>
                            <span class="line" @if($track->status > 1) style="background-color:#98D091;" @elseif($track->status == 1) style="background: #98D091 "@endif></span>
                            <p>Processing Order</p>
                        </div>
                        <div class="quality">
                            <div class="imgcircle" @if($track->status > 2) style="background-color:#98D091;" @elseif($track->status == 2) style="background-color:#98D091;"@endif>
                                <img src="{{URL::asset('images/quality.png')}}" alt="quality check">
                            </div>
                            <span class="line" @if($track->status > 2) style="background-color:#98D091;" @elseif($track->status == 2) style="background-color:#98D091;"@endif></span>
                            <p>Quality Check</p>
                        </div>
                        <div class="dispatch">
                            <div class="imgcircle" @if($track->status > 3) style="background-color:#98D091;" @elseif($track->status == 3) style="background-color:#98D091;"@endif>
                                <img src="{{URL::asset('images/dispatch.png')}}" alt="dispatch product">
                            </div>
                            <span class="line" @if($track->status > 3) style="background-color:#98D091;" @elseif($track->status == 3) style="background-color:#98D091;"@endif></span>
                            <p>Dispatched Item</p>
                        </div>
                        <div class="delivery">
                            <div class="imgcircle"@if($track->status == 4) style="background-color:#98D091;" @endif>
                                <img src="{{URL::asset('images/delivery.png')}}" alt="delivery">
                            </div>
                            <p>Product Delivered</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Tracking Box Area =================-->

@endsection

<!--================End Content Area =================-->



















