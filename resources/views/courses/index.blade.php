@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Courses</h1>
            <p class="page-subtitle">Course catalog and academic ownership.</p>
        </div>
        <div class="page-actions">
            <a href="/" class="btn btn-secondary">Back</a>
            <a href="/courses/create" class="btn btn-primary">Add Course</a>
        </div>
    </div>

    <div class="table-shell">
        <div class="table-wrap">
            <table class="record-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>
                                <div class="action-row">
                                    <a href="/courses/{{ $course->id }}" class="action-link">Show</a>
                                    <a href="/courses/{{ $course->id }}/edit" class="action-link">Edit</a>
                                    <form method="POST" action="/courses/{{ $course->id }}"
                                        onsubmit="return confirm('Are you sure you want to delete this course?')">
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
