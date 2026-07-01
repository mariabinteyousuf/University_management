@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Course</h1>
            <p class="page-subtitle">Update course ownership and teaching assignment.</p>
        </div>
        <div class="page-actions">
            <a href="/courses" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/courses/{{ $course->id }}">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Course Name</label>
                        <input type="text" name="course_name" class="form-input field-input" value="{{ $course->course_name }}">
                    </div>

                    <div class="form-field">
                        <label class="form-label">Department</label>
                        <select name="department_id" class="form-select field-input">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $course->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field">
                        <label class="form-label">Teacher</label>
                        <select name="teacher_id" class="form-select field-input">
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/courses" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Course</button>
                </div>
            </form>
        </div>
    </div>
@endsection
