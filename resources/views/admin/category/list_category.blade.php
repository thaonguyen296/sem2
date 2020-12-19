@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Category
            <small>List</small>
        </h1>
    </div>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead class="table-list">
            <tr align="center">
                <th>Category Code</th>
                <th>Name</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $category)
                <tr class="odd gradeX" align="center">
                    <td>{{ $category->category_code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td class="center"><i class="fas fa-trash-alt"></i>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete_category').submit();">Delete</a>
                        <form id="delete_category" action="{{url('/admin/delete_category/'.$category->id)}}" method="post" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    </td>
                    <td class="center"><i class="fas fa-pencil-alt"></i> <a href="{{url('/admin/edit_category/'.$category->id)}}"> Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
