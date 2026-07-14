<?php

namespace App\Http\Controllers;


use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $departments=Department::all();
        $department=request('department_id');

        $search = request("search");

        $students = Student::query()
        ->when($search,function($query) use ($search){
            $query->where("name","like","%".$search."%");
        })

        ->when($department,function($query) use ($department){
            $query->where('department_id',$department);
        })
        ->paginate(10)
        ->withQueryString();

        return view('students.index',[
            'students' => $students,
            'departments'=>$departments 
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
        $student->load(['department','registrations']);
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
        return redirect()->route('students.edit', $student)
            ->with('success', 'Student Updated Successfully!');
    }

    public function destroy(Student $student)
    {
        if ($student->photo && Storage::disk('public')->exists($student->photo)) {
        Storage::disk('public')->delete($student->photo);
    }
        $student->delete();
        return redirect('/students')->with('success','Student Deleted Successfully!');
    }
}
