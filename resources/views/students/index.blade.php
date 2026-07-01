@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Students</h1>
            <p class="page-subtitle">Student profiles and contact records.</p>
        </div>
        <div class="page-actions">
            <a href="/" class="btn btn-secondary">Back</a>
            <a href="/students/create" class="btn btn-primary">Add Student</a>
        </div>
    </div>

    <div class="table-shell">
        <div class="table-wrap">
            <table class="record-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Email Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <div class="action-row">
                                    <a href="/students/{{ $student->id }}" class="action-link">Show</a>
                                    <a href="/students/{{ $student->id }}/edit" class="action-link">Edit</a>
                                    <form method="POST" action="/students/{{ $student->id }}">
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
