@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Teacher Details</h1>
            <p class="page-subtitle">Faculty profile overview.</p>
        </div>
        <div class="page-actions">
            <a href="/teachers" class="btn btn-secondary">Back</a>
            <a href="/teachers/{{ $teacher->id }}/edit" class="btn btn-primary">Edit Teacher</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Teacher ID</div>
                    <div class="detail-value">{{ $teacher->id }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Name</div>
                    <div class="detail-value">{{ $teacher->name }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">{{ $teacher->email }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Department</div>
                    <div class="detail-value">{{ $teacher->department?->name ?? 'Unassigned' }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
