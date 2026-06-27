@extends('layouts.app')

@section('content')

<h2>Create Event</h2>

<!-- Department Selection Form -->
<form method="GET" action="/events/create">

    <div class="form-group">

        <label>Department</label>

        <select name="department_id" class="form-control" onchange="this.form.submit()">

            <option value="">Select Department</option>

            @foreach($departments as $department)

                <option value="{{ $department->id }}"
                    {{ request('department_id') == $department->id ? 'selected' : '' }}>

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

    </div>

</form>

<br>

<!--2nd Form-->

@if(request('department_id'))

<form method="POST" action="/events">

    @csrf

    <input
        type="hidden"
        name="department_id"
        value="{{ request('department_id') }}">

    <div class="form-group">

        <label>Event Title</label>

        <input
            type="text"
            name="title"
            class="form-control"
            placeholder="Enter Event Title">
        

        @error('title')
            <p class="error">
                Please enter a title.
            </p>
        @enderror

    </div>

    <br>

    <div class="form-group">

        <label>Select Players</label>

        <br><br>

        @foreach($students as $student)

            <input
                type="checkbox"
                name="students[]"
                value="{{ $student->id }}">

            {{ $student->name }}

            <br>

        @endforeach

        @error('students')
            <p class="error">
                Please select at least one player.
            </p>
        @enderror

    </div>

    <br>

    <div class="form-group">

        <label>Event Time</label>

        <input
            type="datetime-local"
            name="time"
            class="form-control">

        @error('time')
            <p class="error">
                Please select event time.
            </p>
        @enderror

    </div>

    <br>

    <button class="btn create-btn">Create Event</button>
    <a href="/events" class="btn back-btn"> Cancel</a>

</form>

@endif

@endsection