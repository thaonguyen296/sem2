@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Shipping
{{--            <small>Edit</small>--}}
        </h1>
    </div>

    <div class="col-lg-7" style="padding-bottom:120px">
            <div class="form-group">
                <label>Order code: </label>
                <span> {{ $order->code }}</span>
            </div>
            <div class="form-group">
                <label>Name Customer: </label>
                <span> {{$order->name}}</span>
            </div>
            <div class="form-group">
                <label>Email: </label>
                <span> {{$order->email}}</span>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <span> {{$order->phone_number}}</span>
            </div>
            <div class="form-group">
                <label>Address: </label>
                <span> {{$order->address}}</span>
            </div>
            <div class="form-group">
                <label>Note: </label>
                <span> {{$order->note}}</span>
            </div>
            <div class="form-group">
                <label>Quantity: </label>
                <span> {{$order->quantity}}</span>
            </div>
            <div class="form-group">
                <label>Total: </label>
                <span> {{$order->total}}</span>
            </div>
            <div class="form-group">
                <label>Payment: </label>
                @if($order->payment == 1)<span style="color: #5cb85c;"> Paid</span>
                @else<span style="color: red;"> Paid</span> @endif
            </div>
            <form action="{{url('/admin/shipping/update_status/'.$order->id)}}" method="post" id="form-shipping">
                @csrf
            @if(Auth::user()->level_admin->level != 2 && Auth::user()->level_admin->level != 3)
            <div class="form-group">
                <label>Shipper: </label>
                <select name="shipper">
                    <option>Select shipper</option>
                    @foreach($shippers as $shipper)
                    <option value="{{$shipper->user_id}}" @if($shipper->user_id == $order->tracking->shipper) selected @endif> {{$shipper->admin->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            @if(Auth::user()->level_admin->level == 3)
            <div class="form-group">
                <label> Status</label>
                <select class="form-control" name="status">
                    <option value="0" @if($order->tracking->status == 0) selected @endif>Confirmed order</option>
                    <option value="1" @if($order->tracking->status == 1) selected @endif>Process order</option>
                    <option value="2" @if($order->tracking->status == 2) selected @endif>Quality check</option>
                    <option value="3" @if($order->tracking->status == 3) selected @endif>Dispatched item</option>
                    <option value="4" @if($order->tracking->status == 4) selected @endif>Product delivered</option>
                </select>
            </div>
            </form>
            @endif
{{--            <div class="form-group">--}}
{{--                <a href="{{ url('/admin/shipping/list_product/'.$order->code) }}">List product</a>--}}
{{--            </div>--}}
            @if ($errors->any())
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            @endif
            <button type="submit" class="btn btn-secondary" onclick="document.getElementById('form-shipping').submit();">Category Save</button>
            <button type="reset" class="btn btn-primary"><a href="{{url('/admin/shipping')}}" style="color: #fff;">Back</a></button>
    </div>

@endsection
