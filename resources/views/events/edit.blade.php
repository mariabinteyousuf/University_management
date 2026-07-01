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
            <form method="GET" action="/events/{{ $event->id }}/edit">
                <div class="form-grid-two">
                    <div class="form-field">
                        <label class="form-label">Team 1 Department</label>
                        <select name="department1_id" class="form-select field-input" onchange="this.form.submit()">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ (int) $department1 === $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field">
                        <label class="form-label">Team 2 Department</label>
                        <select name="department2_id" class="form-select field-input" onchange="this.form.submit()">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ (int) $department2 === $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            <form method="POST" action="/events/{{ $event->id }}" class="mt-8 border-t border-zinc-200 pt-8">
                @csrf
                @method('PATCH')

                <input type="hidden" name="department1_id" value="{{ $department1 }}">
                <input type="hidden" name="department2_id" value="{{ $department2 }}">

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Event Title</label>
                        <input type="text" name="title" value="{{ old('title', $event->title) }}" class="form-input field-input">
                        @error('title')
                            <p class="form-error">Please enter a title.</p>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label class="form-label">Event Time</label>
                        <input type="datetime-local" name="time" value="{{ old('time', date('Y-m-d\TH:i', strtotime($event->time))) }}" class="form-input field-input">
                        @error('time')
                            <p class="form-error">Please select event time.</p>
                        @enderror
                    </div>

                    <div class="form-grid-two">
                        <div class="form-field">
                            <label class="form-label">Team 1 Players</label>
                            <div class="team-list">
                                @forelse($teamOne as $student)
                                    <label class="flex items-center gap-3 bg-zinc-50 p-3 text-sm font-semibold text-zinc-700">
                                        <input type="checkbox" name="teamOne_students[]" value="{{ $student->id }}" {{ $event->students->contains($student->id) ? 'checked' : '' }} class="form-checkbox field-checkbox">
                                        <span>{{ $student->name }}</span>
                                    </label>
                                @empty
                                    <p class="text-sm font-semibold text-zinc-500">No students found for this department.</p>
                                @endforelse
                            </div>
                            @error('teamOne_students')
                                <p class="form-error">Please select valid team 1 players.</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label class="form-label">Team 2 Players</label>
                            <div class="team-list">
                                @forelse($teamTwo as $student)
                                    <label class="flex items-center gap-3 bg-zinc-50 p-3 text-sm font-semibold text-zinc-700">
                                        <input type="checkbox" name="teamTwo_students[]" value="{{ $student->id }}" {{ $event->students->contains($student->id) ? 'checked' : '' }} class="form-checkbox field-checkbox">
                                        <span>{{ $student->name }}</span>
                                    </label>
                                @empty
                                    <p class="text-sm font-semibold text-zinc-500">No students found for this department.</p>
                                @endforelse
                            </div>
                            @error('teamTwo_students')
                                <p class="form-error">Please select valid team 2 players.</p>
                            @enderror
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
