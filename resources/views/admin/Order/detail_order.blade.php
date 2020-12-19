@extends('admin/nav')

@section('content')
    <button type="reset" class="btn btn-primary" style="margin-bottom: 15px;"><a href="{{url('/admin/list_order')}}" style="color: #fff;">Back</a></button>
    <div class="row mb-5">
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
            <div class="confirmation-card">
                <h3 class="billing-title">Order Info</h3>
                <table class="order-rable">
                    <tr>
                        <td>Code orders</td>
                        <td>: 60235</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>: {{$order->created_at->format('d/m/Y')}}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>: USD {{$order->total}}</td>
                    </tr>
                    <tr>
                        <td>Payment method</td>
                        <td>: @if($order->payment == 0) COD @elseif($order->payment == 1) Banking @endif</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
            <div class="confirmation-card">
                <h3 class="billing-title">Billing Address</h3>
                <table class="order-rable">
                    <tr>
                        <td>Street</td>
                        <td>: {{$order->address}}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>: {{$order->address}}</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>: {{$order->address}}</td>
                    </tr>
                    <tr>
                        <td>Postcode</td>
                        <td>: {{$order->address}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="order_details_table">
        <h2>Order Details</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>
                            <h4>{{$cart->product->name}}</h4>
                        </td>
                        <td>
                            <h5>{{$cart->number_product}}</h5>
                        </td>
                        <td>
                            <h4>${{$cart->product->price * $cart->number_product}}</h4>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <h4>Shipping</h4>
                    </td>
                    <td></td>
                    <td>
                        <h4>$1.5</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Total</h4>
                    </td>
                    <td>
                        <h5>{{$order->quantity}}</h5>
                    </td>
                    <td>
                        <h4>${{$order->total + 1.5}}</h4>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection