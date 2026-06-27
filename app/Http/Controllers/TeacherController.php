<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return view('teachers.index',[
            'teachers' => $teachers 
     ]);
    }

     
    public function create()
    {  
        $departments = Department::all();

        return view('teachers.create',[
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

        Teacher::create([
             'name'=> request('name'),
             'email'=> request('email'),
             'department_id'=>request('department_id')
        ]);

         return redirect('/teachers');

    }


    public function show(Teacher $teacher)
    {
        return view('teachers.show',[
            'teacher'=> $teacher
        ]);
    }


    public function edit(Teacher $teacher)
    {
         $departments =Department::all();
         
        return view('teachers.edit',[
            'teacher'=> $teacher,
            'departments'=>$departments
        ]);
    }

    public function update(Teacher $teacher)
    {
        request()->validate([
         'name'=>['required'],
         'email'=>['required'],
         'department_id'=>['required']
        ]);
        
        $teacher->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'department_id'=>request('department_id')
        ]);
        return redirect('/teachers');        
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('/teachers');
    }

}
