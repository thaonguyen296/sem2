@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Admin
            <small>List</small>
        </h1>
    </div>
    <table class="table table-striped table-bshippinged table-hover" id="dataTables-example">
        <thead class="table-list">
            <tr align="center">
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
                <th>created_at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($admin as $admin)
            @if($admin->id != Auth::user()->id)
                <tr class="odd gradeX" align="center">
                    <td>{{ $admin->admin->name }}</td>
                    <td>{{ $admin->admin->email }}</td>
                    <td>
                        @if($admin->level == 0) Full control
                        @elseif($admin->level == 1) View and Post
                        @elseif($admin->level == 2) View
                        @elseif($admin->level == 3) Shipper @endif
                    </td>
                    <td>{{ $admin->admin->created_at }}</td>
                    <td class="center"><i class="fas fa-pencil-alt"></i> <a href="{{url ('/admin/edit_admin/'.$admin->user_id)}}">Edit</a></td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

@endsection
