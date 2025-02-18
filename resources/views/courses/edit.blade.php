@extends('panel.layouts.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Course</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Course</li>
        </ol>
    </nav>
</div>
<form action="{{ route('courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection