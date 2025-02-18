<?php

// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use App\Models\Student;
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
        return view('students.create');
    }

    // Store new student data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    // Show the form to edit a student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Update student data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

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
