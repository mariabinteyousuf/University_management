<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('departments',DepartmentController::class);
Route::resource('teachers' ,TeacherController::class);
Route::resource('students',StudentController::class);
Route::resource('courses',CourseController::class);
Route::resource('registrations',RegistrationController::class);
Route::resource('events', EventController::class);