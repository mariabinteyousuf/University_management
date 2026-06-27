@extends('layouts.app')
@section('content')

<h2>{{ $event->title }}</h2>

<p><strong>Department:</strong> {{ $event->department->name }}</p>
<p><strong>Event Time:</strong>{{ $event->time }}</p>

<h3>Players</h3>

<ul>

    @foreach($event->students as $student)

        <li>
            {{ $student->name }}
        </li>

    @endforeach

</ul>

<a href="/events" class="btn back-btn">Back</a>

@endsection