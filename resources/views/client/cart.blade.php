@extends('layout')

<!-- ================ start banner area ================= -->

@section('banner')
    <section class="banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center banner">
                    <h1>Shopping Cart</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- ================ end banner area ================= -->

<!--================Cart Area =================-->

@section('content')
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    @if(isset($_SESSION['cart']) && count($_SESSION['cart']))
                        <table id="table_cart" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $cart)
                                <tr class="column" id="column{{$cart['id']}}">
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="http://res.cloudinary.com/thaocute2906/image/upload/c_fit,h_100,w_100/{{ $cart['image'] }}.png" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $cart['name'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>$<span id="price.{{$cart['id']}}">{{ $cart['price'] }}</span></h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input onchange="updateCart({{$cart['id']}})" type="number" name="qty" id="sst{{ $cart['id'] }}" value="{{ $cart['number'] }}" title="Quantity:" class="input-text qty">
                                            <button onclick="var result = document.getElementById('sst{{ $cart['id'] }}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                            <button onclick="var result = document.getElementById('sst{{ $cart['id'] }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 id="quantity{{ $cart['id'] }}">${{ $cart['number'] * $cart['price'] }}</h5>
                                    </td>
                                    <td>
                                        <a onclick="deleteCart({{ $cart['id'] }})" style="cursor: pointer;">
                                            <i class="far fa-trash-alt" style="margin-left: 15px;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                                <tr class="bottom_button">
                                    <td>
                                        {{--                                    <a class="button" href="category.php">Update Cart</a>--}}
                                        <button class="button">Update Cart</button>
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="cupon_text d-flex align-items-center">
                                            <input type="text" placeholder="Coupon Code">
                                            <a class="primary-btn" href="{{url('/checkout')}}">Payment</a>
                                            <a class="button" href="#">Have a Coupon?</a>
                                        </div>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="empty-cart">
                                <span class="mascot-image"></span>
                                <p class="message">Không có sản phẩm nào trong giỏ hàng của bạn.</p>
                                <a href="{{url('/category')}}" class="btn btn-yellow">Tiếp tục mua sắm</a>
                            </div>
                        @endif

                </div>
            </div>
        </div>
    </section>
    @endsection

<!--================End Cart Area =================-->