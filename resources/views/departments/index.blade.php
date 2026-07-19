@extends('layouts.admin')

@section('title', 'Departments')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Departments</h2>

    <a href="{{ route('departments.create') }}" class="btn btn-primary">
        + Add Department
    </a>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<table class="table table-bordered">

    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Code</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>

@if($departments->count())

    @foreach($departments as $department)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $department->name }}</td>

            <td>{{ $department->code }}</td>

            <td>
                {{ $department->status ? 'Active' : 'Inactive' }}
            </td>

            <td>

                <a href="#" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="#" class="btn btn-danger btn-sm">
                    Delete
                </a>

            </td>

        </tr>

    @endforeach

@else

    <tr>

        <td colspan="5" class="text-center">

            No Departments Found

        </td>

    </tr>

@endif

</tbody>

</table>

@endsection