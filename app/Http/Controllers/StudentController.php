<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index',[
            'students' => $students 
     ]);
    }

     
    public function create()
    {
        $departments =Department::all();

        return view('students.create',[
            'departments' => $departments
        ]);
    }


    public function store()
    {
        request()->validate([
            'name'=>['required'],
            'email'=>['required'],
            'department_id'=>['required']
        ]);

        Student::create([
             'name'=> request('name'),
             'email'=> request('email'),
             'department_id'=>request('department_id')
        ]);

         return redirect('/students');

    }


    public function show(Student $student)
    {
        return view('students.show',[
            'student'=> $student
        ]);
    }


    public function edit(Student $student)
    {
        $departments =Department::all();
        return view('students.edit',[
            'student'=> $student,
            'departments'=>$departments
        ]);
    }

    public function update(Student $student)
    {
        request()->validate([
         'name'=>['required'],
         'email'=>['required'],
         'department_id'=>['required']
        ]);
        
        $student->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'department_id'=>request('department_id')
        ]);
        return redirect('/students');        
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students');
    }
}
