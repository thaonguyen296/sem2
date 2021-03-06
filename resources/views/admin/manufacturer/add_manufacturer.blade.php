@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Manufacturer
            <small>Add</small>
        </h1>
    </div>

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{url('/admin/add_manufacturer')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="manufacturer_name" placeholder="Please Enter Manufacturer Name" />
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            @endif
            <button type="submit" class="btn btn-secondary">Manufacturer Add</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>

@endsection
