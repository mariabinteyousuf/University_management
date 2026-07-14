<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['student', 'course'])->get();

        return view('registrations.index',[
            'registrations'=>$registrations
        ]);
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();

        return view('registrations.create',[
        'students' => $students,
        'courses' => $courses]);
    }


    public function store()
    {
      request()->validate([
         'student_id'=>['required'],
         'course_ids' => ['required', 'array'],
         'course_ids.*' => ['exists:courses,id'],
         'semester'=>['required']
        ]);

        foreach (request('course_ids') as $courseId){
        Registration::create([
            'student_id'=>request('student_id'),
            'course_id' => $courseId,
            'semester'=>request('semester')
        ]);

        }

         return redirect('/registrations')
          ->with('success', 'Registration created successfully!');
    }


    public function show(Registration $registration)
    {
        return view('registrations.show',[
            'registration'=> $registration
        ]);
    }


    public function edit(Registration $registration)
    {
         $students = Student::all();
        $courses = Course::all();
        return view('registrations.edit',[
            'registration'=> $registration,
            'students' => $students,
            'courses' => $courses
        ]);
    }

    public function update(Registration $registration)
    {
        request()->validate([
         'student_id'=>['required'],
         'course_id'=>['required'],
         'semester'=>['required']
        ]);
        
        $registration->update([
            'student_id'=>request('student_id'),
            'course_id'=>request('course_id'),
            'semester'=>request('semester')
        ]);
        return redirect('/registrations');        
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect('/registrations');
    }
}
