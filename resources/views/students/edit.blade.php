@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Student</h1>
            <p class="page-subtitle">Update student profile information.</p>
        </div>
        <div class="page-actions">
            <a href="/students" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/students/{{ $student->id }}">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Student Name</label>
                        <input type="text" name="name" class="form-input field-input" value="{{ $student->name }}">
                    </div>

                    <div class="form-field">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input field-input" value="{{ $student->email }}">
                    </div>

                    <div class="form-field">
                        <label class="form-label">Department</label>
                        <select name="department_id" class="form-select field-input">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $student->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/students" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
            </form>
        </div>
    </div>
@endsection
