<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Event;
use App\Models\Student;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
{
    $events = Event::all();

    return view('events.index', [
        'events' => $events
    ]);
}


    public function create()
{
    $departments = Department::all();
     $students = [];

    if (request('department_id')) {

        $students = Student::query()->where(
            'department_id',
            request('department_id')
        )->get();
    }

    return view('events.create', [
        'departments' => $departments,
        'students'=> $students
    ]);
}
    
    public function store()
{
       request()->validate([
        'title' => ['required'],
        'department_id' => ['required'],
        'students' => ['required'],
        'time' => ['required']
    ]);

    $event = Event::create([
        'title' => request('title'),
        'department_id' => request('department_id'),
        'time' => request('time')
    ]);

    $event->students()->attach(
        request('students')
    );

    return redirect('/events');
} 


    public function show(Event $event)
{
    return view('events.show', [
        'event' => $event
    ]);
}

 public function edit(Event $event)
    {
        $departments =Department::all();
        $students =Student::all();

        return view('events.edit',[
            'event'=>$event,
            'students'=> $students,
            'departments'=>$departments
        ]);
    }

    public function update(Event $event)
    {
        request()->validate([
         'title'=>['required'],
         'department_id'=>['required'],
         'time'=>['required']
        ]);
        
        $event->update([
            'title'=>request('title'),
            'department_id'=>request('department_id'),
            'time'=>request('time')
        ]);

          if (request('students')) {
            $event->students()->sync(
                request('students')
            );
        }

        return redirect('/events');        
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect('/events');
}
}