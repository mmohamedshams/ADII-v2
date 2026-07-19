@extends('layouts.admin')

@section('title', 'Add Department')

@section('content')

<h2>Add Department</h2>

<hr>

<form action="{{ route('departments.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Name</label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name') }}"
        >

        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Code</label>

        <input
            type="text"
            name="code"
            class="form-control"
            value="{{ old('code') }}"
        >

        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>

        <textarea
            name="description"
            class="form-control"
            rows="4"
        >{{ old('description') }}</textarea>
    </div>

    <button class="btn btn-success">
        Save Department
    </button>

</form>

@endsection