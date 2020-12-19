@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>List</small>
        </h1>

    </div>
{{--    <div style="overflow-x: scroll">--}}
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead class="table-list">
                <tr align="center">
                    <th>Code</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Price</th>
                    <th>Manufacturer</th>
                     <th>Category</th>
                    <th>Trending</th>
                    <th>Created_at</th>
{{--                    <th>Updated_at</th>--}}
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach($product as $product)
                <tr class="odd gradeX" align="center">
                    <td>{{ $product->code_product.'-'.$product->product_number }}</td>
                    <td><img src="http://res.cloudinary.com/thaocute2906/image/upload/c_fit,h_100,w_100/{{ $product->image }}.png" alt=""></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->manufacturer->name }}</td>
                     <td>{{ $product->category->name }}</td>
                    <td>@if($product->trending == 0) Yes @else No @endif</td>
                    <td>{{ $product->created_at->format('d-m-Y') }}</td>
{{--                    <td>{{ $product->updated_at }}</td>--}}
                    <td class="center"><i class="fas fa-trash-alt"></i>
                        <a href="#" onclick="event.preventDefault();
                           document.getElementById('delete_product').submit();"> Delete</a>
                        <form id="delete_product" action="{{url('/admin/delete_product/'.$product->id)}}" method="post" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </td>
                    <td class="center"><i class="fas fa-pencil-alt"></i> <a href="{{url('/admin/edit_product/'.$product->id)}}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--    </div>--}}

@endsection
