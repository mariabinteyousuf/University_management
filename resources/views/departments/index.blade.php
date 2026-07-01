@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Departments</h1>
            <p class="page-subtitle">Academic departments available across the institution.</p>
        </div>
        <div class="page-actions">
            <a href="/" class="btn btn-secondary">Back</a>
            <a href="/departments/create" class="btn btn-primary">Add Department</a>
        </div>
    </div>

    <div class="table-shell">
        <div class="table-wrap">
            <table class="record-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td>
                                <div class="action-row">
                                    <a href="/departments/{{ $department->id }}" class="action-link">Show</a>
                                    <a href="/departments/{{ $department->id }}/edit" class="action-link">Edit</a>
                                    <form method="POST" action="/departments/{{ $department->id }}">
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
