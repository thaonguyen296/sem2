@extends('layout')

<!-- ================ start banner area ================= -->



<!-- ================ end banner area ================= -->

<!--================Cart Area =================-->

@section('content')
    <section class="section-margin--small">
        <div class="container">
            <div class="row">
                        <!-- You can make it whatever width you want. I'm making it full width
                        on <= small devices and 4/12 page width on >= medium devices -->
                        <div class="col-xs-12 col-md-4 " style="display: block; margin: auto;">


                            <!-- CREDIT CARD FORM STARTS HERE -->
                            <div class="panel panel-default credit-card-box">
                                <div class="panel-heading display-table" >
                                    <div class="row display-tr" >
                                        <h3 class="panel-title display-td" >Payment Details</h3>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form role="form" id="payment-form" action="{{url('/credit')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_bill" value="{{$bill_id}}">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="vietcom"><img src="{{URL::asset('img/logo-card/vietcom.jpg')}}" alt=""></label>
                                                <input type="radio" value="1" name="bank" id="vietcom">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="viettin"><img src="{{URL::asset('img/logo-card/viettin.png')}}" alt=""></label>
                                                <input type="radio" value="2" name="bank" id="viettin">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="shinhan"><img src="{{URL::asset('img/logo-card/shinhan.jpg')}}" alt=""></label>
                                                <input type="radio" value="3" name="bank" id="shinhan">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="bidv"><img src="{{URL::asset('img/logo-card/bidv.png')}}" alt=""></label>
                                                <input type="radio" value="4" name="bank" id="bidv">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12" style="margin-top: 15px;">
                                                <div class="form-group" style="margin-left: 16px;">
                                                    <label for="cardNumber" style="color: #333;font-weight: bold;font-size: 14px;">CARD NUMBER</label>
                                                    <div class="input-group">
                                                        <input
                                                                type="tel"
                                                                class="form-control"
                                                                name="cardNumber"
                                                                autocomplete="cc-number"
                                                                required autofocus
                                                        />
                                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group" style="margin-left: 16px;">
                                                    <label for="couponCode" style="color: #333;font-weight: bold;font-size: 14px;">VERIFY CODE</label>
                                                    <input type="text" class="form-control" name="verifyCode" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12" style="margin-left: 16px;">
                                                <button class="btn-lg btn-block" type="submit" style="background-color: #0064cb; color: white;">Payment</button>
                                            </div>
                                        </div>
                                        <div class="row" style="display:none;">
                                            <div class="col-xs-12">
                                                <p class="payment-errors"></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- CREDIT CARD FORM ENDS HERE -->
                </div>

                <!-- If you're using Stripe for payments -->
{{--                <script type="text/javascript" src="https://js.stripe.com/v2/"></script>--}}
            </div>
        </div><!--wrapper end-->
    </section>
@endsection

<!--================End Cart Area =================-->