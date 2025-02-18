<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

Route::get('/', [AuthController::class, 'login']);
Route::post('/', [AuthController::class, 'auth_login']);

Route::get('panel/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/courses', [CourseController::class, 'course_list']);
Route::post('/courses', [CourseController::class, 'create_course']);



Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::post('students/{studentId}/add-course', [StudentController::class, 'addCourse']);
Route::post('students/{studentId}/remove-course', [StudentController::class, 'removeCourse']);
