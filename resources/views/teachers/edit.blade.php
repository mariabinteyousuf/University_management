@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Teacher</h1>
            <p class="page-subtitle">Update faculty profile information.</p>
        </div>
        <div class="page-actions">
            <a href="/teachers" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/teachers/{{ $teacher->id }}">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Teacher Name</label>
                        <input type="text" name="name" class="form-input field-input" value="{{ $teacher->name }}">
                    </div>

                    <div class="form-field">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input field-input" value="{{ $teacher->email }}">
                    </div>

                    <div class="form-field">
                        <label class="form-label">Department</label>
                        <select name="department_id" class="form-select field-input">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $teacher->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/teachers" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Teacher</button>
                </div>
            </form>
        </div>
    </div>
@endsection
