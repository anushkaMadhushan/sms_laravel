<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Display list of courses
    public function index(Request $request)
    {
        $courses = course::where('name', 'like', '%' . $request->search . '%')->get();
        return view('courses.index', compact('courses'));
    }

    // Show create course form
    public function create()
    {
        return view('courses.create');
    }

    // Store new course
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Course::create(['name' => $request->name]);
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    // Show edit form
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $course->update(['name' => $request->name]);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    // Delete course
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
