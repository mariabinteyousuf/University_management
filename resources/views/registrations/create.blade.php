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
                        <label class="form-label">Courses</label>
                          <div class="grid grid-cols-2 gap-3 border rounded-lg p-4">
                              @foreach($courses as $course)
                              <label class="flex items-center gap-2">
                                <input
                                  type="checkbox"
                                  name="course_ids[]"
                                  value="{{ $course->id }}"
                                  class="rounded text-blue-600">
                                 <span>{{ $course->course_name }}</span> 
                              </label>
                              @endforeach
                          </div>
                            @error('course_ids')
                              <p class="form-error">Please select a course.</p>
                            @enderror
                        </div>    
                        
                        <div class="form-field">
                            <label class="form-label">Semester</label>
                            <input 
                            type="text"
                            name="semester"
                            class="form-input field-input"
                            placeholder="Semester">
                             @error('semester')
                               <p class="form-error">Please enter a semester.</p>
                             @enderror
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
