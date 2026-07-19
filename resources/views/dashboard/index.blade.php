@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<h1>Dashboard</h1>

<p>Welcome, {{ Auth::user()->name }}</p>

<hr>

<div style="display:flex;gap:20px;flex-wrap:wrap;">

    <div style="width:220px;background:#0d6efd;color:white;padding:20px;border-radius:10px;">
        <h3>Departments</h3>
        <h1>0</h1>
    </div>

    <div style="width:220px;background:#198754;color:white;padding:20px;border-radius:10px;">
        <h3>Students</h3>
        <h1>0</h1>
    </div>

    <div style="width:220px;background:#dc3545;color:white;padding:20px;border-radius:10px;">
        <h3>Teachers</h3>
        <h1>0</h1>
    </div>

</div>

@endsection