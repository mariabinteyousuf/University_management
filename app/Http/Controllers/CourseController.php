<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('courses.index',[
            'courses' => $courses
     ]);
    }

     
    public function create()
    {
        $departments=Department::all();
        $teachers=Teacher::all();
        return view('courses.create',[
            'departments'=> $departments,
            'teachers'=>$teachers
        ]);
    }


    public function store()
    {
        request()->validate([
            'course_name'=>['required'],
            'teacher_id'=>['required'],
            'department_id'=>['required'],
            'day' => ['required'],
            'start_time' => ['required'],
             'end_time' => ['required'],
        ]);

        Course::create([
             'course_name'=> request('course_name'),
             'teacher_id'=> request('teacher_id'),
             'department_id'=>request('department_id'),

             'day' => request('day'),
             'start_time' => request('start_time'),
             'end_time' => request('end_time'),
    
        ]);

         return redirect('/courses');

    }


    public function show(Course $course)
    {
        return view('courses.show',[
            'course'=> $course
        ]);
    }


    public function edit(Course $course)
    {  
         $departments=Department::all();
        $teachers=Teacher::all();

        return view('courses.edit',[
            'course'=> $course,
            'departments'=> $departments,
            'teachers'=>$teachers
        ]);
    }

    public function update(Course $course)
    {
        request()->validate([
         'course_name'=>['required'],
         'teacher_id'=>['required'],
         'department_id'=>['required'],
         'day' => ['required'],
         'start_time' => ['required'],
         'end_time' => ['required']
        ]);
        
        $course->update([
            'course_name'=>request('course_name'),
            'teacher_id'=>request('teacher_id'),
            'department_id'=>request('department_id'),
            'day' => request('day'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time')
        ]);
        return redirect('/courses');        
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect('/courses');
    }
}
