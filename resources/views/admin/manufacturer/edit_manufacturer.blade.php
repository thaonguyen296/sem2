@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Manufacturer
            <small>Edit</small>
        </h1>
    </div>

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{url('/admin/edit_manufacturer/'.$manufacturer->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Manufacturer Name</label>
                <input class="form-control" name="manufacturer_name" value="{{ $manufacturer->name }}" placeholder="Please Enter Manufacturer Name" />
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger">{{ $message }}</div>
                @endforeach
            @endif
            <button type="submit" class="btn btn-secondary">Save</button>
            <button type="reset" class="btn btn-primary"><a href="{{url('/admin/list_manufacturer')}}" style="color: #fff;">Back</a></button>
        </form>
    </div>

@endsection
