@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Add Student</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Add Student</li>
        </ol>
    </nav>
</div>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    {{-- <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div> --}}
    <button type="submit" class="btn btn-success">Save</button>
</form>

@endsection
