@extends('layouts.app')
@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Events</h1>
            <p class="page-subtitle">Department matchups, schedules, and team selections.</p>
        </div>
        <div class="page-actions">
            <a href="/" class="btn btn-secondary">Back</a>
            <a href="/events/create" class="btn btn-primary">Create Event</a>
        </div>
    </div>

    <div class="table-shell">
        <div class="table-wrap">
            <table class="record-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Departments</th>
                        <th>Event Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->departmentOne?->name ?? 'Unassigned' }} vs {{ $event->departmentTwo?->name ?? 'Unassigned' }}</td>
                            <td>{{ $event->time }}</td>
                            <td>
                                <div class="action-row">
                                    <a href="/events/{{ $event->id }}" class="action-link">Show</a>
                                    <a href="/events/{{ $event->id }}/edit" class="action-link">Edit</a>
                                    <form method="POST" action="/events/{{ $event->id }}"
                                        onsubmit="return confirm('Are you sure you want to delete this event?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
