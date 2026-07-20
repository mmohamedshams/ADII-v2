@extends('layouts.admin')

@section('title', 'Departments')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Departments</h2>

    <button class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#addDepartmentModal">
    + Add Department
</button>
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

 <tbody id="departmentsTableBody">

@if($departments->count())

    @foreach($departments as $department)

        <tr id="department-{{ $department->id }}">

            <td>{{ $loop->iteration }}</td>

            <td>{{ $department->name }}</td>

            <td>{{ $department->code }}</td>

            <td>
                {{ $department->status ? 'Active' : 'Inactive' }}
            </td>

            <td>

                <button
    class="btn btn-warning btn-sm editDepartmentBtn"
    data-id="{{ $department->id }}">
    Edit
</button>

              <button
    type="button"
    class="btn btn-danger btn-sm deleteDepartmentBtn"
    data-id="{{ $department->id }}">
    Delete
</button>

            </td>

        </tr>

    @endforeach

@else

    <tr id="emptyRow">
        <td colspan="5" class="text-center">
            No Departments Found
        </td>
    </tr>

@endif

</tbody>

</table>
<!-- Add Department Modal -->

@include('departments.partials.modal')
@endsection
