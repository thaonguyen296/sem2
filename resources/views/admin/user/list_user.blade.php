@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">User
            <small>List</small>
        </h1>
    </div>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead class="table-list">
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $user)
                @if($user->id != Auth::user()->id)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if($user->level == 0) Admin @elseif($user->level == 1) Customer @endif</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td class="center"><i class="fas fa-pencil-alt"></i> <a href="{{url ('/admin/edit_user/'.$user->id)}}">Edit</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

@endsection
