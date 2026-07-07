@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Teachers</h1>
            <p class="page-subtitle">Faculty records and departmental assignments.</p>
        </div>
        <div class="page-actions">
            <a href="/" class="btn btn-secondary">Back</a>
            <a href="/teachers/create" class="btn btn-primary">Add Teacher</a>
        </div>
    </div>

    <div class="table-shell">
        <div class="table-wrap">
            <table class="record-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Teacher Name</th>
                        <th>Email Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>
                                <div class="action-row">
                                    <a href="/teachers/{{ $teacher->id }}" class="action-link">Show</a>
                                    <a href="/teachers/{{ $teacher->id }}/edit" class="action-link">Edit</a>
                                    <form method="POST" action="/teachers/{{ $teacher->id }}"
                                        onsubmit="return confirm('Are you sure you want to delete this teacher?')">
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
