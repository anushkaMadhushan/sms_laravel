<?php

// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show student list
    // app/Http/Controllers/StudentController.php

    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $students = $query->get();
        return view('students.index', compact('students'));
    }


    // Show the form to add a student
    public function create()
    {
        $courses = Course::all();

        // Return the 'create' view with the courses data
        return view('students.create', compact('courses'));
    }


    // Store new student data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'courses' => 'required|array',
        ]);

        $student = Student::create($request->only(['name', 'email']));

        $student->courses()->sync($request->courses);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully.');
    }


    // Show the form to edit a student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }


    // Update student data
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'courses' => 'required|array',
        ]);

        $student = Student::findOrFail($id);

        $student->update($request->only(['name', 'email']));

        $student->courses()->sync($request->courses);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }



    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
