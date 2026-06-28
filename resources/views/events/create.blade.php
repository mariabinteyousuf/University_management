@extends('layouts.app')

@section('content')

<h2>Create Event</h2>

<!-- Department Selection Form -->
<form method="GET" action="/events/create">

    <div class="form-group">

        <label>Team 1 Department</label>

        <select name="department1_id" class="form-control" onchange="this.form.submit()">

            <option value="">Select Department</option>

            @foreach($departments as $department)

                <option value="{{ $department->id }}"
                    {{ request('department1_id') == $department->id ? 'selected' : '' }}>

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

    </div>

 <div class="form-group">

        <label>Team 2 Department</label>

        <select
            name="department2_id"
            class="form-control"
            onchange="this.form.submit()">

            <option value="">
                Select Department
            </option>

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}"
                    {{ request('department2_id') == $department->id ? 'selected' : '' }}>
                 
                    {{-- @if(request('department1_id') == $department->id)
                        disabled
                    @endif> --}}

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

    </div>


</form>

<br>

<!--2nd Form-->

@if(request('department1_id') && request('department2_id'))

<form method="POST" action="/events">

    @csrf

    <input
        type="hidden"
        name="department1_id"
        value="{{ request('department1_id') }}">

    <input
        type="hidden"
        name="department2_id"
        value="{{ request('department2_id') }}">   

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

        <label>Select Team 1 Players</label>

        <br><br>

        @foreach($teamOne as $student)

            <input
                type="checkbox"
                name="teamOne_students[]"
                value="{{ $student->id }}">

            {{ $student->name }}

            <br>

        @endforeach

        @error('teamOne_students')
            <p class="error">
                Please select team 1 players.
            </p>
        @enderror

<br></br>

         <label>Select Team 2 Players</label>

        <br><br>

        @foreach($teamTwo as $student)

            <input
                type="checkbox"
                name="teamTwo_students[]"
                value="{{ $student->id }}">

            {{ $student->name }}

            <br>

        @endforeach

        @error('teamTwo_students')
            <p class="error">
                Please select team 2 players.
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