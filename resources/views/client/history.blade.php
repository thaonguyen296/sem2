@extends('layout')

<!-- ================ start banner area ================= -->

@section('banner')
    <section class="banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center banner">
                    <h1>History Bill</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">History Bill</li>
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
<div class="col-xs-12 customer-table-wrap" id="customer_orders">
    <div class="customer_order customer-table-bg">

        <p class="title-detail">
            Danh sách đơn hàng đã đặt
        </p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="order_number text-center">Mã đơn hàng</th>
                    <th class="date text-center">Ngày đặt</th>
                    <th class="date text-center">Địa chỉ giao hàng</th>
                    <th class="total text-right">Thành tiền</th>
                    <th class="payment_status text-center">Trạng thái thanh toán</th>
                    <th class="fulfillment_status text-center">Vận chuyển</th>

                </tr>
                </thead>
                <tbody>
                @foreach($bills as $bill)
                    <tr class="odd">
                        <td class="text-center"><a href="{{url('/bill_'.$bill->code)}}" title="">#{{$bill->code}}</a></td>
                        <td class="text-center"><span>{{$bill->created_at->format('d/m/Y')}}</span></td>
                        <td class="text-center"><span>{{$bill->address}}</span></td>
                        <td class="text-right"><span class="total money">${{$bill->total}}</span></td>
                        <td class="text-center"><span class="status_paid" @if($bill->payment != 1 && $bill->tracking->status != 4)style="color: red;" @endif> pay </span></td>
                        <td class="text-center"><span class="status_fulfilled" @if($bill->tracking->status != 4) style="color: red;"  @endif>transport</span></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
    @endsection
