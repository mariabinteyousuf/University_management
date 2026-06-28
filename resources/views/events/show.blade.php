@extends('layouts.app')
@section('content')

<h2>{{ $event->title }}</h2>
<h2>{{ $event->departmentOne->name }} VS {{ $event->departmentTwo->name }}
</h2>
<p><strong>Event Time:</strong>{{ $event->time }}</p>

<h3>{{ $event->departmentOne->name }}</h3>
<ul>
    @foreach($event->students->where('pivot.department_id',$event->department1_id) as $student)

    <li>{{ $student->name }} <br></li>

@endforeach
</ul>

<h3>{{ $event->departmentTwo->name }}</h3>
<ul>
    @foreach($event->students->where('pivot.department_id',$event->department2_id) as $student)

    <li>{{ $student->name }} <br></li>

@endforeach
</ul>


<a href="/events" class="btn back-btn">Back</a>

@endsection