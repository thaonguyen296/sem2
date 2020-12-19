@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Order
            <small>List</small>
        </h1>
    </div>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead class="table-list">
        <tr align="center">
            <th>Code orders</th>
            <th>Name</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>Address</th>
            <th>Payment</th>
            <th>Created_at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order as $order)
            <tr class="odd gradeX" align="center">
                <td>{{ $order->code }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone_number }}</td>
                <td>{{ $order->address }}</td>
                <td>@if( $order->payment  == 1) Banking
                    @elseif( $order->payment  == 0) COD
                    @endif</td>
                <td>{{ $order->created_at }}</td>
                <td class="center"><i class="fas fa-info"></i> <a href="{{url ('/admin/detail_order/'.$order->id)}}">Detail</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection