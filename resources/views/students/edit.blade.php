@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Edit Student</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Student</li>
            </ol>
        </nav>
    </div>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name"
                value="{{ old('name', $student->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email"
                value="{{ old('email', $student->email) }}" required>
        </div>

        <!-- Checkbox for Courses -->
        <div class="form-group">
            <label>Courses</label>
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input type="checkbox" name="courses[]" value="{{ $course->id }}" class="form-check-input"
                                id="course_{{ $course->id }}" @if (in_array($course->id, old('courses', $student->courses->pluck('id')->toArray()))) checked @endif>
                            <label class="form-check-label" for="course_{{ $course->id }}">{{ $course->name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
