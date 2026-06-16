<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
   public function index()
   {
    $departments = Department::all();

    return view('departments.index',[
        'departments' => $departments
    ]);
   }


//show create form
   public function create()
   {
    return view('departments.create');
   }


//save new department into databse
   public function store()
   {
    request()->validate([
        'name'=> ['required'] //validate incoming data
    ]);

    Department::create([
        'name' => request('name')  //create the record in the database
    ]);
   
    return redirect('/departments'); //back to departments page

   }



   public function show(Department $department)
{
    return view('departments.show',
    compact('department'));
}



  public function edit(Department $department)
{
    return view('departments.edit',
        compact('department')
    );
}


public function update( Department $department)
{
    request()->validate([
        'name' => ['required']
    ]);

    $department->update([
        'name' => request('name')
    ]);

    return redirect('/departments');
}


public function destroy(
    Department $department
)
{
    $department->delete();

    return redirect('/departments');
}

}
