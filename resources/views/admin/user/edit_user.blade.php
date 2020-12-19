@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">User
            <small>Edit</small>
        </h1>
    </div>

    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{url('/admin/edit_user/'.$user->id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>Level User</label>
                <select name="level_user" class="form-control">
                    <option value="0" @if($user->level == 0) selected @endif>Admin</option>
                    <option value="1" @if($user->level == 1) selected @endif>Customer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-secondary">Save</button>
            <button type="reset" class="btn btn-primary"><a href="{{url('/admin/list_user')}}" style="color: #fff;">Back</a></button>
        </form>
    </div>

@endsection
