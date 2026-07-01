@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Registration</h1>
            <p class="page-subtitle">Update course registration details.</p>
        </div>
        <div class="page-actions">
            <a href="/registrations" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/registrations/{{ $registration->id }}">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Student</label>
                        <select name="student_id" class="form-select field-input">
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ $registration->student_id == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field">
                        <label class="form-label">Course</label>
                        <select name="course_id" class="form-select field-input">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $registration->course_id == $course->id ? 'selected' : '' }}>
                                    {{ $course->course_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field">
                        <label class="form-label">Semester</label>
                        <input type="text" name="semester" class="form-input field-input" value="{{ $registration->semester }}">
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/registrations" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Registration</button>
                </div>
            </form>
        </div>
    </div>
@endsection
