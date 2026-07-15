@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Course</h1>
            <p class="page-subtitle">Add a course and connect it to a department and teacher.</p>
        </div>
        <div class="page-actions">
            <a href="/courses" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/courses">
                @csrf

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Course Name</label>
                        <input type="text" name="course_name" class="form-input field-input" placeholder="Enter course name">
                        @error('course_name')
                            <p class="form-error">Please enter a valid course name.</p>
                        @enderror
                    </div>

                    <div class="form-field">
                         <label class="form-label">Day</label>
                         <select name="day" class="form-select field-input">
                            <option value="">Select Day</option>
                            <option>Sunday</option>
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thursday</option>

                         </select>
                    </div>

                    <div class="form-field">
                       <label class="form-label">Start Time</label>

                           <input
                            type="time"
                            name="start_time"
                            class="form-input field-input">
                    </div>

                    <div class="form-field">
                        <label class="form-label">End Time</label>

                            <input
                             type="time"
                             name="end_time"
                             class="form-input field-input">
                    </div>
                    <div class="form-field">
                        <label class="form-label">Department</label>
                        <select name="department_id" class="form-select field-input">
                            <option value="">Select Department</option>
                            @foreach($departments as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <p class="form-error">Please select a department.</p>
                        @enderror
                    </div>
                    <div class="form-field">
                        <label class="form-label">Teacher</label>
                        <select name="teacher_id" class="form-select field-input">
                            <option value="">Select Teacher</option>
                            @foreach($teachers as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('teacher_id')
                            <p class="form-error">Please select a teacher.</p>
                        @enderror
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/courses" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Course</button>
                </div>
            </form>
        </div>
    </div>
@endsection
