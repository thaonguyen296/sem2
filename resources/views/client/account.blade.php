@extends('layout')

<!-- ================ start banner area ================= -->

@section('banner')
    <section class="banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center banner">
                    <h1>Account</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- ================ end banner area ================= -->



@section('content')

    <!--================Checkout Area =================-->
    <section class="section-margin--small mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-5 account_left">
{{--                    <h4>{{ Auth::user()->name }}</h4>--}}
                    <img src="http://res.cloudinary.com/thaocute2906/image/upload/c_fit,h_150,w_150/{{ Auth::user()->image }}.png" width="150px" height="auto" alt="">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-7 account_right">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Name </label>
                        </div>
                        <div class="col-md-7 infor-user">
                            <span class="label-infor1">:&ensp;{{ Auth::user()->name }}</span>
                            <div style="display:none" id="view">
                                <form class="form-profile" action="{{url('updateProfile')}}" method="post">
                                    @csrf
                                    <input type="text" value="{{ Auth::user()->name }}" name="name">
                                    <button>Save</button>
                                    <submit class="edit1" style="cursor: pointer;">Back</submit>
                                </form>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <h6 id="edit" class="edit1"><a style="cursor: pointer;">Edit</a></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Email </label>
                        </div>
                        <div class="col-md-7 infor-user">
                            <span class="label-infor2">:&ensp;{{ Auth::user()->email }}</span>
                            <div style="display:none" id="view2">
                                <form class="form-profile" action="{{url('updateProfile')}}" method="post">
                                    @csrf
                                    <input type="text" value="{{ Auth::user()->email }}" name="email">
                                    <button>Save</button>
                                    <submit class="edit2" style="cursor: pointer;">Back</submit>
                                </form>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <h6 id="edit" class="edit2" ><a style="cursor: pointer;">Edit</a></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Address </label>
                        </div>
                        <div class="col-md-7 infor-user">
                            <span class="label-infor3">:&ensp;{{ Auth::user()->address }}</span>
                            <div style="display:none" id="view3">
                                <form class="form-profile" action="{{url('updateProfile')}}" method="post">
                                    @csrf
                                    <input type="text" value="{{ Auth::user()->address }}" name="address">
                                    <button>Save</button>
                                    <submit class="edit3" style="cursor: pointer;">Back</submit>
                                </form>
                            </div>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <h6 id="edit" class="edit3" ><a style="cursor: pointer;">Edit</a></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">PhoneNumber </label>
                        </div>
                        <div class="col-md-7 infor-user">
                            <span class="label-infor4">:&ensp;{{ Auth::user()->phonenumber }}</span>
                            <div style="display:none" id="view4">
                                <form class="form-profile" action="{{url('updateProfile')}}" method="post">
                                    @csrf
                                    <input type="text" value="{{ Auth::user()->phonenumber }}" name="phonenumber">
                                    <button>Save</button>
                                    <submit class="edit4" style="cursor: pointer;">Back</submit>
                                </form>
                            </div>
                            @error('phonenumber')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <h6 id="edit" class="edit4" ><a style="cursor: pointer;">Edit</a></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Password </label>
                        </div>
                        <div class="col-md-7 infor-user">
                            <span class="label-infor5">:&ensp;*********</span>
                            <div style="display:none" id="view5">
                                <form class="form-profile" action="{{url('updateProfile')}}" method="post">
                                    @csrf
                                    <input type="password" name="old_password" placeholder="Old Password">
                                    <input type="password" name="password" placeholder="New Password">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                    <button>Save</button>
                                    <submit class="edit5" style="cursor: pointer;">Back</submit>
                                </form>
                            </div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $message)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endforeach
                            @endif
                            @if (session('error'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <h6 id="edit" class="edit5" ><a style="cursor: pointer;">Edit</a></h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{URL::asset('img/hisbuy/city.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('img/hisbuy/city2.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{URL::asset('img/hisbuy/city3.png')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!--================End Checkout Area =================-->

@endsection

<!--================End Blog Area =================-->