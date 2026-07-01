@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Course Details</h1>
            <p class="page-subtitle">Course record overview.</p>
        </div>
        <div class="page-actions">
            <a href="/courses" class="btn btn-secondary">Back</a>
            <a href="/courses/{{ $course->id }}/edit" class="btn btn-primary">Edit Course</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Course ID</div>
                    <div class="detail-value">{{ $course->id }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Course Name</div>
                    <div class="detail-value">{{ $course->course_name }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
