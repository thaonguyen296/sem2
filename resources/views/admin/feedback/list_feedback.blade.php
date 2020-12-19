@extends('admin/nav')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Feedback
            <small>List</small>
        </h1>
    </div>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead class="table-list">
        <tr align="center">
            <th>Name</th>
            <th>Email</th>
            <th>Product</th>
            <th>Service</th>
            <th>Shipping</th>
            <th>Content</th>
            <th>Created_at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($feedback as $feedback)
                <tr class="odd gradeX" align="center">
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>@if($feedback->product == 1) Very Satisfied
                        @elseif($feedback->product == 2) Satisfied
                        @elseif($feedback->product == 3) Unsatisfied
                        @elseif($feedback->product == 4) Very Unsatisfied
                        @endif
                    </td>
                    <td>@if($feedback->service == 1) Very Satisfied
                        @elseif($feedback->service == 2) Satisfied
                        @elseif($feedback->service == 3) Unsatisfied
                        @elseif($feedback->service == 4) Very Unsatisfied
                        @endif</td>
                    <td>@if($feedback->shipping == 1) Very Satisfied
                        @elseif($feedback->shipping == 2) Satisfied
                        @elseif($feedback->shipping == 3) Unsatisfied
                        @elseif($feedback->shipping == 4) Very Unsatisfied
                        @endif</td>
                    <td>{{ $feedback->content }}</td>
                    <td>{{ $feedback->created_at }}</td>
                </tr>
        @endforeach
        </tbody>
    </table>

@endsection