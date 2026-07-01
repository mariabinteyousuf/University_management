@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Event</h1>
            <p class="page-subtitle">Update event details, departments, and selected players.</p>
        </div>
        <div class="page-actions">
            <a href="/events" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/events/{{ $event->id }}">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Event Title</label>
                        <input type="text" name="title" value="{{ $event->title }}" class="form-input field-input">
                    </div>

                    <div class="form-grid-two">
                        <div class="form-field">
                            <label class="form-label">Team 1 Department</label>
                            <select name="department1_id" class="form-select field-input">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ $event->department1_id == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-field">
                            <label class="form-label">Team 2 Department</label>
                            <select name="department2_id" class="form-select field-input">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ $event->department2_id == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-field">
                        <label class="form-label">Event Time</label>
                        <input type="datetime-local" name="time" value="{{ date('Y-m-d\TH:i', strtotime($event->time)) }}" class="form-input field-input">
                    </div>

                    <div class="form-field">
                        <label class="form-label">Players</label>
                        <div class="form-grid-two">
                            @foreach($students as $student)
                                <label class="flex items-center gap-3 bg-zinc-50 p-3 text-sm font-semibold text-zinc-700">
                                    <input type="checkbox" name="students[]" value="{{ $student->id }}" {{ $event->students->contains($student->id) ? 'checked' : '' }} class="form-checkbox field-checkbox">
                                    <span>{{ $student->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/events" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Event</button>
                </div>
            </form>
        </div>
    </div>
@endsection
