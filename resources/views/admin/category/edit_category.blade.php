@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Category
            <small>Edit</small>
        </h1>
    </div>

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{url('/admin/edit_category/'.$category->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Category Code</label>
                <input class="form-control" name="category_code" value="{{ $category->category_code }}" placeholder="Please Enter Category Code" />
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="category_name" value="{{ $category->name }}" placeholder="Please Enter Category Name" />
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            @endif
            <button type="submit" class="btn btn-secondary">Save</button>
            <button type="reset" class="btn btn-primary"><a href="{{url('/admin/list_category')}}" style="color: #fff;">Back</a></button>
        </form>
    </div>

@endsection
