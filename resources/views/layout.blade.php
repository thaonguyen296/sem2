<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Miki Shop</title>
    <link rel="icon" href="{{URL::asset('img/Fevicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{URL::asset('vendors/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendors/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendors/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{URL::asset('vendors/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style2.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style3.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style4.css')}}">
    <link href="{{URL::asset('css/theme.css')}}" rel="stylesheet" media="all">
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand logo_h" href="{{url('/home')}}"><img src="{{URL::asset('img/logo.png')}}" alt="" width="110px;"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="{{url('/home')}}">Home</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="{{url('/category')}}" class="nav-link dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Product</a>
                            </li>


                            <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/feedback')}}">Feedback</a></li>
                        </ul>

                        <ul class="nav-shop">
                            <li>
                                <form action="{{url('/search')}}" method="get">
                                    <input class="form-control" name="value_search" type="text" placeholder="Search" aria-label="Search" style="border-radius: 20px;">
                                </form>
                            </li>
                            <li class="nav-item">
                                <button><a href="{{url('/cart')}}"><i class="ti-shopping-cart"></i>
                                        <span id="nav-shop__circle" class="nav-shop__circle">
                                            @if(!isset($_SESSION['cart'])) 0
                                            @elseif(isset($_SESSION['cart']))
                                                @php
                                                $quantity = 0;
                                                foreach ($_SESSION['cart'] as $cart) {
                                                    $quantity += $cart['number'];
                                                }
                                                echo $quantity;
                                                @endphp
                                            @endif
                                        </span>
                                    </a></button>
                                </li>
                                @guest
                                <li class="nav-item"><a class="button button-header" href="{{route('login')}}">Login/Register</a></li>
                                @else
                                <li class="nav-item" style="cursor: pointer;">
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="http://res.cloudinary.com/thaocute2906/image/upload/c_fit,h_40,w_40/{{ Auth::user()->image }}.png" alt="" style="border-radius: 50%;"/>
                                            </div>
                                            <div class="content">
                                                {{ Auth::user()->name }}
                                                <i class="fas fa-caret-down" style="color: #666666;"></i>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="http://res.cloudinary.com/thaocute2906/image/upload/c_fit,h_100,w_100/{{ Auth::user()->image }}.png" alt="{{ Auth::user()->name }}" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">{{ Auth::user()->name }}</a>
                                                        </h5>
                                                        <span class="email">{{ Auth::user()->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    @can('admin')
                                                        <div class="account-dropdown__item">
                                                            <a href="{{url('/admin')}}"><i class="zmdi zmdi-account"></i>Admin Page</a>
                                                        </div>
                                                    @endcan
                                                    <div class="account-dropdown__item">
                                                        <a href="{{url('/profile')}}">
                                                            <i class="zmdi zmdi-account"></i>Account</a>
                                                    </div>
                                                <div class="account-dropdown__item">
                                                    <a href="{{url('/history_order')}}">
                                                        <i class="zmdi zmdi-money-box"></i>History Bill</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!--================ End Header Menu Area =================-->

    <!-- ================ start banner area ================= -->
                   @yield('banner')
    <!-- ================ end banner area ================= -->



    <!--================Content Area =================-->
                    @yield('content')

    <!--================End Content Area =================-->



    <!--================ Start footer Area  =================-->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="row section_gap">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title large_title">Our Mission</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto at eligendi
                                incidunt nesciunt reprehenderit voluptas. Dignissimos distinctio, dolore et facere fuga
                                fugiat harum itaque maiores modi nesciunt odio odit.</p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Quick Links</h4>
                            <ul class="list">
                                <li><a href="{{url('/home')}}">Home</a></li>
                                <li><a href="{{url('/category')}}">Product</a></li>
                                <li><a href="{{url('/contact')}}">Contact</a></li>
                                <li><a href="{{url('/feedback')}}">Feedback</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h4 class="footer_title">Gallery</h4>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="{{URL::asset('img/gallery/r1.jpg')}}" width="70px" alt=""></li>
                                <li><img src="{{URL::asset('img/gallery/r2.jpg')}}" width="70px" alt=""></li>
                                <li><img src="{{URL::asset('img/gallery/r3.jpg')}}" width="70px" alt=""></li>
                                <li><img src="{{URL::asset('img/gallery/r5.jpg')}}" width="70px" alt=""></li>
                                <li><img src="{{URL::asset('img/gallery/r7.jpg')}}" width="70px" alt=""></li>
                                <li><img src="{{URL::asset('img/gallery/r8.jpg')}}" width="70px" alt=""></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span>Miki Shop
                                </p>
                                <p>8 Ton That Thuyet</p>

                                <p class="sm-head">
                                    <span class="fa fa-phone"></span> Phone Number
                                </p>
                                <p>
                                    +0368 836 321 <br> +0970 325 555
                                </p>

                                <p class="sm-head">
                                    <span class="fa fa-envelope"></span> Email
                                </p>
                                <p>
                                    Shop@Fpt.com <br> www.MikiShop.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex">
                    <p class="col-lg-12 footer-text text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Miki Shop <i class="fa fa-heart" aria-hidden="true"></i> by T1808M
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->


{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
    <script src="{{URL::asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('vendors/skrollr.min.js')}}"></script>
    <script src="{{URL::asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    <script src="{{URL::asset('vendors/jquery.form.js')}}"></script>
{{--    <script src="{{URL::asset('vendors/jquery.validate.min.js')}}"></script>--}}
    <script src="{{URL::asset('vendors/contact.js')}}"></script>
    <script src="{{URL::asset('vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{URL::asset('vendors/mail-script.js')}}"></script>
    <script src="{{URL::asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/mains.js')}}"></script>
    <script src="{{URL::asset('js/jss.js')}}"></script>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <script>
        // Thêm sản phẩm vào giỏ hàng
        function addToCart(id) {
            number = $('#sst'+id).val();
            $.ajax({
                url: "{{url('/addToCart')}}/"+id,
                type: "post",
                data: {
                    'number': number,
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    console.log(data);
                    $('#nav-shop__circle').text(data);
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        function updateCart(id) {
            number = $('#sst'+id).val();
            $.ajax({
                url: "{{url('/updateCart')}}/"+id,
                type: "post",
                data: {
                    'number': number,
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    if($.isEmptyObject(data.error)) {
                        $('#quantity'+id).text('$'+(number*(JSON.parse(data)[1])));
                        $('#nav-shop__circle').text((JSON.parse(data)[0]));
                    } else {
                        $.each(data.error, function( key, value ) {
                            alert(value);
                        });
                    }

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }
        // Xóa sản phẩm trong giỏ hàng
        function deleteCart(id) {
            $.ajax({
                url: "{{url('/deleteCart')}}/"+id,
                type: "post",
                data:{
                    _token: '{{csrf_token()}}'
                },
                success: function (data) {
                    $('#column'+id).remove();
                    if($('.column').length == 0) { //dunfg hafm  để check số lượng item (giỏ hàng)
                        $('#table_cart').remove(); // bỏ cart
                        $('.table-responsive').html("<div class='empty-cart'><span class='mascot-image'></span><p class='message'>Không có sản phẩm nào trong giỏ hàng của bạn.</p><a href='{{url('/category')}}' class='btn btn-yellow'>Tiếp tục mua sắm</a></div>")
                    }
                    $('#nav-shop__circle').text(data);
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }
    </script>
<script>
    $('input[type="checkbox"]').on('click',function(){
        var selected = $(this).parent().parent().parent();
        $(selected).toggleClass('highlight');
    });
</script>
</body>

</html>