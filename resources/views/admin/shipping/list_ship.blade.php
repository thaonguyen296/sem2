@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Shipping
            <small>List</small>
        </h1>
    </div>

    <table class="table table-striped table-bshippinged table-hover" id="dataTables-example">
        <thead class="table-list">
        <tr align="center">
            <th>Code</th>
            <th>Name</th>
            <th>PhoneNumber</th>
            <th>Address</th>
            @if(Auth::user()->level_admin->level == 0) <th>Shipper</th> @endif
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(Auth::user()->level_admin->level == 3)
            @foreach($shippings as $shipping)
                @if(Auth::user()->id == $shipping->tracking->shipper)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $shipping->code }}</td>
                        <td>{{ $shipping->name }}</td>
                        <td>{{ $shipping->phone_number }}</td>
                        <td>{{ $shipping->address }}</td>
{{--                        @if(Auth::user()->level_admin->level == 0) <td>@if($shipping->tracking->shipper){{$shipping->tracking->user->name}} @endif</td> @endif--}}
                        <td>
                            @if($shipping->tracking->status == 0)
                                Confirmed order
                            @elseif($shipping->tracking->status == 1)
                                Process order
                            @elseif($shipping->tracking->status == 2)
                                Quality check
                            @elseif($shipping->tracking->status == 3)
                                Dispatched item
                            @elseif($shipping->tracking->status == 4)
                                Product delivered
                            @endif
                        </td>
                        <td class="center"><i class="fas fa-info"></i> <a href="{{url ('/admin/shipping/'.$shipping->code)}}">Detail</a></td>
                    </tr>
                @endif
            @endforeach
        @else
        @foreach($shippings as $shipping)
            <tr class="odd gradeX" align="center">
                <td>{{ $shipping->code }}</td>
                <td>{{ $shipping->name }}</td>
                <td>{{ $shipping->phone_number }}</td>
                <td>{{ $shipping->address }}</td>
                @if(Auth::user()->level_admin->level == 0) <td>@if($shipping->tracking->shipper){{$shipping->tracking->user->name}} @endif</td> @endif
                <td>
                    @if($shipping->tracking->status == 0)
                        Confirmed order
                    @elseif($shipping->tracking->status == 1)
                        Process order
                    @elseif($shipping->tracking->status == 2)
                        Quality check
                    @elseif($shipping->tracking->status == 3)
                        Dispatched item
                    @elseif($shipping->tracking->status == 4)
                        Product delivered
                    @endif
                </td>
                <td class="center"><i class="fas fa-info"></i> <a href="{{url ('/admin/shipping/'.$shipping->code)}}">Detail</a></td>
            </tr>

        @endforeach
        @endif
        </tbody>
    </table>

@endsection
