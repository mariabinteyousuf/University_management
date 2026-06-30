@extends('layouts.app')

@section('content')

<h2>Edit Event</h2>

<!-- Department Selection Form -->
<form method="GET" action="/events/{{ $event->id }}/edit">

    <div class="form-group">

        <label>Team 1 Department</label>

        <select
            name="department1_id"
            class="form-control"
            onchange="this.form.submit()">

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}"
                    {{ request('department1_id', $event->department1_id) == $department->id ? 'selected' : '' }}>

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

    </div>

    <br>

    <div class="form-group">

        <label>Team 2 Department</label>

        <select
            name="department2_id"
            class="form-control"
            onchange="this.form.submit()">

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}"
                    {{ request('department2_id', $event->department2_id) == $department->id ? 'selected' : '' }}>

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

    </div>

</form>

<br>

<form method="POST" action="/events/{{ $event->id }}">

    @csrf
    @method('PATCH')

    <input
        type="hidden"
        name="department1_id"
        value="{{ request('department1_id', $event->department1_id) }}">

    <input
        type="hidden"
        name="department2_id"
        value="{{ request('department2_id', $event->department2_id) }}">

    <div class="form-group">

        <label>Event Title</label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $event->title) }}"
            class="form-control">

    </div>

    <br>

    <div class="form-group">

        <label>Team 1 Players</label>

        <br><br>

        @foreach($teamOne as $student)

            <input
                type="checkbox"
                name="teamOne_students[]"
                value="{{ $student->id }}"
                {{ $event->students->contains($student->id) ? 'checked' : '' }}>

            {{ $student->name }}

            <br>

        @endforeach

    </div>

    <br>

    <div class="form-group">

        <label>Team 2 Players</label>

        <br><br>

        @foreach($teamTwo as $student)

            <input
                type="checkbox"
                name="teamTwo_students[]"
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

    <button class="btn create-btn">
        Update Event
    </button>

    <a href="/events" class="btn back-btn">
        Cancel
    </a>

</form>

@endsection