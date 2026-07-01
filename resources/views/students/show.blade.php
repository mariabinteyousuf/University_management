@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Student Details</h1>
            <p class="page-subtitle">Student profile overview.</p>
        </div>
        <div class="page-actions">
            <a href="/students" class="btn btn-secondary">Back</a>
            <a href="/students/{{ $student->id }}/edit" class="btn btn-primary">Edit Student</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Student ID</div>
                    <div class="detail-value">{{ $student->id }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Name</div>
                    <div class="detail-value">{{ $student->name }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">{{ $student->email }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
