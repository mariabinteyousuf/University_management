@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Teacher</h1>
            <p class="page-subtitle">Register a faculty member and assign a department.</p>
        </div>
        <div class="page-actions">
            <a href="/teachers" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/teachers">
                @csrf

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Teacher Name</label>
                        <input type="text" name="name" class="form-input field-input" placeholder="Enter teacher name">
                        @error('name')
                            <p class="form-error">Please enter a valid teacher name.</p>
                        @enderror
                    </div>
                    <div class="form-field">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input field-input" placeholder="Enter email address">
                        @error('email')
                            <p class="form-error">Please enter a valid email address.</p>
                        @enderror
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
                </div>

                <div class="form-footer">
                    <a href="/teachers" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Teacher</button>
                </div>
            </form>
        </div>
    </div>
@endsection
