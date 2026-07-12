@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Registration Details</h1>
            <p class="page-subtitle">Course registration overview.</p>
        </div>
        <div class="page-actions">
            <a href="/registrations" class="btn btn-secondary">Back</a>
            <a href="/registrations/{{ $registration->id }}/edit" class="btn btn-primary">Edit Registration</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Registration ID</div>
                    <div class="detail-value">{{ $registration->id }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Student ID</div>
                    <div class="detail-value">{{ $registration->student->name }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Course ID</div>
                    <div class="detail-value">{{ $registration->course->course_name }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Semester</div>
                    <div class="detail-value">{{ $registration->semester }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
