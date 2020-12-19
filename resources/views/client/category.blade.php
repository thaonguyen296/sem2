@extends('layout')

<!-- ================ start banner area ================= -->

@section('banner')
    <section class="banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center banner">
                    <h1>Shop Category</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Category</li>
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

    <!-- ================ category section start ================= -->
    <section class="section-margin--small mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="sidebar-categories">
                        <div class="head">Browse Categories</div>
                        <ul class="all ">
                            <li class="common-filter ">
                                <form action="#">
                                    <ul id="border">
                                        @foreach($category as $categories)
                                            <li class="filter-list drop-category{{$categories->id}}"><label for="drop{{$categories->id}}">{{$categories->name}}</label> </li>
                                            <li id="drop{{$categories->id}}" style="display: none;">
                                                <ul>
                                            @foreach($manufacturer as $manufacturers)
                                                <li>
                                                    <a style="color: #666666;" href="{{url('/category_'.$categories->id.'_'.$manufacturers->id)}}">{{$manufacturers->name}}</a>
                                                </li>
                                            @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                        <script src="{{URL::asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
                                        <script>
                                            $(document).ready(function() {
                                                @foreach($category as $categories)
                                                $(".drop-category{{$categories->id}}").click(function() {
                                                    $("#drop{{$categories->id}}").slideToggle(600);
                                                })
                                                @endforeach
                                            })
                                        </script>
                                    </ul>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div class="sorting">
                        </div>
                        <div style="margin-left: 680px;">

                            <form action="{{url('/search')}}" method="get">
                                <div class="input-group filter-bar-search">
                                    <input name="value_search" type="text" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-md-6 col-lg-4">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="http://res.cloudinary.com/thaocute2906/image/upload/c_fit,h_550,w_550/{{ $product['image'] }}.png" alt="">
                                        <ul class="card-product__imgOverlay">
                                            <input id="sst{{$product->id}}" type="hidden" min="1" value="1">
                                            <li><button onclick="addToCart({{$product->id}})"><i class="ti-shopping-cart"> Cart</i></button></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$product->category->name}}</p>
                                        <h4 class="card-product__title"><a href="{{url('/detail_product/'.$product->id)}}">{{$product->name}}</a></h4>
                                        <p class="card-product__price">${{$product->price}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="float-right">
                            {{ $products->links() }}
                        </div>
                    </section>
                    <!-- End Best Seller -->
                </div>
            </div>
        </div>
    </section>
    <!-- ================ category section end ================= -->

    <!-- ================ top product area start ================= -->
    <section class="related-product-area">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Popular Item in the market</p>
                <h2>Top <span class="section-intro__style">Product</span></h2>
            </div>
            <div class="row mt-30">
                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-4.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-5.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-6.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-7.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-8.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-9.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                    <div class="single-search-product-wrapper">
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                        <div class="single-search-product d-flex">
                            <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Gray Coffee Cup</a>
                                <div class="price">$170.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ top product area end ================= -->

    <!-- ================ Subscribe section start ================= -->
    <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center">
                <h3 class="subscribe__title">Get Update From Anywhere</h3>
                <p>Bearing Void gathering light light his eavening unto dont afraid</p>
                <div id="mc_embed_signup">
                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
                        <div class="form-group ml-sm-auto">
                            <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">
                            <div class="info"></div>
                        </div>
                        <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
                        <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ================ Subscribe section end ================= -->

@endsection

<!--================End Blog Area =================-->