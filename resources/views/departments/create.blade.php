@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Department</h1>
            <p class="page-subtitle">Add a new academic department.</p>
        </div>
        <div class="page-actions">
            <a href="/departments" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/departments">
                @csrf

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Department Name</label>
                        <input type="text" name="name" class="form-input field-input" placeholder="Enter department name">
                        @error('name')
                            <p class="form-error">Please enter a valid department name.</p>
                        @enderror
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/departments" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Department</button>
                </div>
            </form>
        </div>
    </div>
@endsection
