@extends('layouts.app')
@section('content')

<h2>Edit Event</h2>

<form method="POST" action="/matches/{{ $event->id }}">
    @csrf
    @method('PATCH')

    <div class="form-group">

        <label>Match Title</label>

        <input
            type="text"
            name="title"
            value="{{ $event->title }}"
            class="form-control">

    </div>

    <br>

    <div class="form-group">

        <label>Department</label>

        <select name="department_id"class="form-control">

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}"
                    {{ $event->department_id == $department->id ? 'selected' : '' }}>

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

    </div>

    <br>

    <div class="form-group">

        <label>Players</label>

        <br>

        @foreach($students as $student)

            <input
                type="checkbox"
                name="students[]"
                value="{{ $student->id }}"

                {{ $event->students->contains($student->id) ? 'checked' : '' }}>

            {{ $student->name }}

            <br>

        @endforeach

    </div>

    <br>

    <div class="form-group">

        <label>Event Time</label>

        <input
            type="datetime-local"
            name="time"
            value="{{ date('Y-m-d\TH:i', strtotime($event->time)) }}"
            class="form-control">

    </div>

    <br>

    <button class="btn create-btn">Update</button>

    <a href="/events" class="btn back-btn">Cancel</a>

</form>

@endsection