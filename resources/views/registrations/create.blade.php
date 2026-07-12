@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Registration</h1>
            <p class="page-subtitle">Register a student for a course.</p>
        </div>
        <div class="page-actions">
            <a href="/registrations" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/registrations">
                @csrf

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Student</label>
                        <select name="student_id" class="form-select field-input">
                            <option value="">Select Student</option>
                            @foreach($students as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <p class="form-error">Please select a student.</p>
                        @enderror
                    </div>
                    <div class="form-field">
                        <label class="form-label">Course</label>
                        <select name="course_id" class="form-select field-input">
                            <option value="">Select Course</option>
                            @foreach($courses as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->course_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <p class="form-error">Please select a course.</p>
                        @enderror
                        <div class="form-field">
                            <label>Semester</label>
                            <input 
                            type="text"
                            name="semester"
                            placeholder="Semester">
                             @error('semester')
                            <p class="form-error">Please enter a semester.</p>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/registrations" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Registration</button>
                </div>
            </form>
        </div>
    </div>
@endsection
