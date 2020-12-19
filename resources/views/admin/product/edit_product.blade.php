@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Product
            <small>Edit</small>
        </h1>
    </div>

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{url('/admin/edit_product/'.$product->id)}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Product code</label>
                <input class="form-control" name="code_product" value="{{ $product->code_product }}" placeholder="Please Enter Product code" />
            </div>
            <div class="form-group">
                <label>Product Name</label>
                <input class="form-control" name="product_name" value="{{ $product->name }}" placeholder="Please Enter Product Name" />
            </div>
            <div class="form-group">
                <label>Images</label>
                <img src="http://res.cloudinary.com/thaocute2906/image/upload/c_fit,h_300,w_300/{{ $product->image }}.png" alt="">
                <input type="file" name="image" accept=".png, .jpg, .jpeg">
            </div>
            <div class="form-group">
                <label>Detail</label>
                <textarea class="form-control" rows="5" name="detail">{{ $product->detail }}</textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" type="number" name="price" value="{{ $product->price }}" min="0" step="any" />
            </div>
            <div class="form-group">
                <label>Manufacturer</label>
                <select name="manufacturer_id" class="form-control">
                    @foreach($manufacturer as $manufacturer)
                        <option @if($product->manufacturer_id == $manufacturer->id) selected @endif value={{$manufacturer->id}}>{{$manufacturer->name}}</option>
                    @endforeach
                </select>
            </div>
             <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    @foreach($category as $category)
                        <option @if($category->id == $product->category->id) selected @endif value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Trending</label>
                <select class="form-control" name="trending">
                    <option value="1" @if($product->trending == 1) selected @endif>No</option>
                    <option value="0" @if($product->trending == 0) selected @endif>Yes</option>
                </select>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            @endif
            <button type="submit" class="btn btn-secondary">Category Save</button>
            <button type="reset" class="btn btn-primary"><a href="{{url('/admin/list_product')}}" style="color: #fff;">Back</a></button>
        </form>
    </div>

@endsection
