@extends('layouts.app')

@section('content')
    @php
        $modules = [
            ['title' => 'Departments', 'description' => 'Manage academic departments and their ownership of students, teachers, courses, and events.', 'href' => '/departments'],
            ['title' => 'Teachers', 'description' => 'Maintain teacher profiles, contact records, and departmental assignments.', 'href' => '/teachers'],
            ['title' => 'Students', 'description' => 'Track student records and department affiliation from one operational view.', 'href' => '/students'],
            ['title' => 'Courses', 'description' => 'Create courses, assign departments, and connect teachers to class delivery.', 'href' => '/courses'],
            ['title' => 'Registrations', 'description' => 'Review course registration records and semester assignments.', 'href' => '/registrations'],
            ['title' => 'Events', 'description' => 'Plan department events, team selections, schedules, and match details.', 'href' => '/events'],
        ];
    @endphp

    <div class="page-header">
        <div>
            <h1 class="page-title">University Management System</h1>
            <p class="page-subtitle">Central workspace for academic records, registrations, and inter-department events.</p>
        </div>
    </div>

    <div class="dashboard-grid">
        @foreach($modules as $module)
            <section class="dashboard-card">
                <div>
                    <h3>{{ $module['title'] }}</h3>
                    <p>{{ $module['description'] }}</p>
                </div>
                <a href="{{ $module['href'] }}">Open {{ $module['title'] }}</a>
            </section>
        @endforeach
    </div>

@endsection
