@extends('layouts.app')
@section('content')

<h2>Events</h2>

<div class="top-buttons">
<a href="/events/create" class="btn create-btn">Create Event</a>
<a href="/" class="btn back-btn">Back</a>

</div>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Department</th>
        <th>Event Time</th>
        <th>Actions</th>
    </tr>

    @foreach($events as $event)

    <tr>

        <td>{{ $event->id }}</td>
        <td>{{ $event->title }}</td>
        <td>
            {{ $event->departmentOne->name }}
             VS
            {{ $event->departmentTwo->name }}

        </td>
        <td>{{ $event->time }}</td>

        <td>
            <a href="/events/{{ $event->id }}/edit" class="btn edit-btn">Edit </a>
            <a href="/events/{{ $event->id }}"class="btn show-btn"> Show</a>


            <form method="POST" action="/events/{{ $event->id }}" class="inline-form">
                @csrf
                @method('DELETE')

                <button class="btn delete-btn"> Delete </button>

            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection