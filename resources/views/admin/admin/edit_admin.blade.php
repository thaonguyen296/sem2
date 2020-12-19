@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Admin
            <small>Edit</small>
        </h1>
    </div>
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{url('/admin/edit_admin/'.$admin->user_id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Level User</label>
                <select name="level_admin" class="form-control">
                    <option value="0" @if($admin->level == 0) selected @endif>Full Controller</option>
                    <option value="1" @if($admin->level == 1) selected @endif>Post and View</option>
                    <option value="2" @if($admin->level == 2) selected @endif>View</option>
                    <option value="3" @if($admin->level == 3) selected @endif>shipper</option>
                </select>
            </div>

            <button type="submit" class="btn btn-secondary">Save</button>
            <button type="reset" class="btn btn-primary"><a href="{{url('/admin/list_admin')}}" style="color: #fff;">Back</a></button>
        </form>
    </div>

@endsection
