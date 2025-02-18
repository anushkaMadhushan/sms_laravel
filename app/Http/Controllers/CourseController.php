<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function course_list()
    {
        return view('course.course_index');
    }

    public function create_course()
    {
        return view('course.course_index');
    }


}
