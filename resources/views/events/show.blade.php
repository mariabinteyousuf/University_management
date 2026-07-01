@extends('layouts.app')
@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">{{ $event->title }}</h1>
            <p class="page-subtitle">{{ $event->departmentOne->name }} vs {{ $event->departmentTwo->name }}</p>
        </div>
        <div class="page-actions">
            <a href="/events" class="btn btn-secondary">Back</a>
            <a href="/events/{{ $event->id }}/edit" class="btn btn-primary">Edit Event</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Event Time</div>
                    <div class="detail-value">{{ $event->time }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Matchup</div>
                    <div class="detail-value">{{ $event->departmentOne->name }} vs {{ $event->departmentTwo->name }}</div>
                </div>
            </div>

            <div class="form-grid-two mt-8">
                <section>
                    <h2 class="text-base font-bold text-zinc-950">{{ $event->departmentOne->name }}</h2>
                    <ul class="team-list">
                        @foreach($event->students->where('pivot.department_id', $event->department1_id) as $student)
                            <li>{{ $student->name }}</li>
                        @endforeach
                    </ul>
                </section>

                <section>
                    <h2 class="text-base font-bold text-zinc-950">{{ $event->departmentTwo->name }}</h2>
                    <ul class="team-list">
                        @foreach($event->students->where('pivot.department_id', $event->department2_id) as $student)
                            <li>{{ $student->name }}</li>
                        @endforeach
                    </ul>
                </section>
            </div>
        </div>
    </div>

@endsection
