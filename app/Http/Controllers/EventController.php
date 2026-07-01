<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Event;
use App\Models\Student;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('departmentOne', 'departmentTwo')->get();

        return view('events.index', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        $departments = Department::all();
        $teamOne = [];
        $teamTwo = [];

        if (request('department1_id')) {

            $teamOne = Student::query()->where(
                'department_id',
                request('department1_id')
            )->get();
        }

        if (request('department2_id')) {

            $teamTwo = Student::query()->where(
                'department_id',
                request('department2_id')
            )->get();
        }

        return view('events.create', [
            'departments' => $departments,
            'teamOne' => $teamOne,
            'teamTwo' => $teamTwo,
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required'],
            'department1_id' => ['required'],
            'department2_id' => ['required'],
            'time' => ['required'],
            'teamOne_students' => ['required'],
            'teamTwo_students' => ['required'],
        ]);

        $event = Event::create([
            'title' => request('title'),
            'department1_id' => request('department1_id'),
            'department2_id' => request('department2_id'),
            'time' => request('time'),
        ]);

        foreach (request('teamOne_students') as $student) {

            $event->students()->attach($student, [
                'department_id' => request('department1_id'),
            ]);
        }

        foreach (request('teamTwo_students') as $student) {

            $event->students()->attach($student, [
                'department_id' => request('department2_id'),
            ]);
        }

        return redirect('/events');
    }

    public function show(Event $event)
    {
        $event->load('departmentOne', 'departmentTwo', 'students');

        return view('events.show', [
            'event' => $event,
        ]);
    }

    public function edit(Event $event)
    {
        $event->load('students');
        $departments = Department::all();

        $department1 = request('department1_id', $event->department1_id);
        $department2 = request('department2_id', $event->department2_id);

        $teamOne = Student::query()->where('department_id', $department1)->get();
        $teamTwo = Student::query()->where('department_id', $department2)->get();

        return view('events.edit', [
            'event' => $event,
            'departments' => $departments,
            'teamOne' => $teamOne,
            'teamTwo' => $teamTwo,
            'department1' => $department1,
            'department2' => $department2,
        ]);
    }

    public function update(Event $event)
    {
        request()->validate([
            'title' => ['required'],
            'department1_id' => ['required'],
            'department2_id' => ['required'],
            'time' => ['required'],
            'teamOne_students' => ['array'],
            'teamTwo_students' => ['array'],
        ]);

        $event->update([
            'title' => request('title'),
            'department1_id' => request('department1_id'),
            'department2_id' => request('department2_id'),
            'time' => request('time'),
        ]);

        $event->students()->detach();

        foreach (request('teamOne_students', []) as $student) {
            $event->students()->attach($student, [
                'department_id' => $event->department1_id,
            ]);
        }

        foreach (request('teamTwo_students', []) as $student) {
            $event->students()->attach($student, [
                'department_id' => $event->department2_id,
            ]);
        }

        return redirect('/events');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect('/events');
    }
}
