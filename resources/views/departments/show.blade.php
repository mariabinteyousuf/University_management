@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Department Details</h1>
            <p class="page-subtitle">Department record overview.</p>
        </div>
        <div class="page-actions">
            <a href="/departments" class="btn btn-secondary">Back</a>
            <a href="/departments/{{ $department->id }}/edit" class="btn btn-primary">Edit Department</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Department ID</div>
                    <div class="detail-value">{{ $department->id }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Department Name</div>
                    <div class="detail-value">{{ $department->name }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
