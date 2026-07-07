@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Registrations</h1>
            <p class="page-subtitle">Student course registration records by semester.</p>
        </div>
        <div class="page-actions">
            <a href="/" class="btn btn-secondary">Back</a>
            <a href="/registrations/create" class="btn btn-primary">Add Registration</a>
        </div>
    </div>

    <div class="table-shell">
        <div class="table-wrap">
            <table class="record-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Course ID</th>
                        <th>Semester</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $registration)
                        <tr>
                            <td>{{ $registration->id }}</td>
                            <td>{{ $registration->student_id }}</td>
                            <td>{{ $registration->course_id }}</td>
                            <td>{{ $registration->semester }}</td>
                            <td>
                                <div class="action-row">
                                    <a href="/registrations/{{ $registration->id }}" class="action-link">Show</a>
                                    <a href="/registrations/{{ $registration->id }}/edit" class="action-link">Edit</a>
                                    <form method="POST" action="/registrations/{{ $registration->id }}"
                                        onsubmit="return confirm('Are you sure you want to delete this registration?')">
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
