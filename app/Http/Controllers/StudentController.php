<?php

namespace App\Http\Controllers;


use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Pest\Plugins\Tia\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $search = request("search");
        $students = Student::query()->when($search,function($query) use ($search){
            $query->where("name","like","%".$search."%");
        })->get();

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
            'department_id'=>['required'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);

         $photo = null;

          if (request()->hasFile('photo')) {

            $photo = request()->file('photo')->store('students', 'public');

         }

        Student::create([
             'name'=> request('name'),
             'email'=> request('email'),
             'department_id'=>request('department_id'),
             'photo' => $photo
        ]);

         return redirect('/students')->with('success','Student Created Successfully!');

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
         'department_id'=>['required'],
         'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);

         $photo = $student->photo;

        if (request()->hasFile('photo')) {

              if ($student->photo && Storage::disk('public')->exists($student->photo)) {

               Storage::disk('public')->delete($student->photo);

           }

          $photo = request()->file('photo')->store('students', 'public');
        }
        
        $student->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'department_id'=>request('department_id'),
            'photo' => $photo
        ]);
        return redirect('/students');        
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students');
    }
}
