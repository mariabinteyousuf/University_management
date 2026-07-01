@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Event</h1>
            <p class="page-subtitle">Select two departments, assign players, and schedule the event.</p>
        </div>
        <div class="page-actions">
            <a href="/events" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="GET" action="/events/create">
                <div class="form-grid-two">
                    <div class="form-field">
                        <label class="form-label">Team 1 Department</label>
                        <select name="department1_id" class="form-select field-input" onchange="this.form.submit()">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ request('department1_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-field">
                        <label class="form-label">Team 2 Department</label>
                        <select name="department2_id" class="form-select field-input" onchange="this.form.submit()">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ request('department2_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            @if(request('department1_id') && request('department2_id'))
                <form method="POST" action="/events" class="mt-8 border-t border-zinc-200 pt-8">
                    @csrf
                    <input type="hidden" name="department1_id" value="{{ request('department1_id') }}">
                    <input type="hidden" name="department2_id" value="{{ request('department2_id') }}">

                    <div class="form-grid">
                        <div class="form-field">
                            <label class="form-label">Event Title</label>
                            <input type="text" name="title" class="form-input field-input" placeholder="Enter event title">
                            @error('title')
                                <p class="form-error">Please enter a title.</p>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label class="form-label">Event Time</label>
                            <input type="datetime-local" name="time" class="form-input field-input">
                            @error('time')
                                <p class="form-error">Please select event time.</p>
                            @enderror
                        </div>

                        <div class="form-grid-two">
                            <div class="form-field">
                                <label class="form-label">Team 1 Players</label>
                                <div class="team-list">
                                    @foreach($teamOne as $student)
                                        <label class="flex items-center gap-3 bg-zinc-50 p-3 text-sm font-semibold text-zinc-700">
                                            <input type="checkbox" name="teamOne_students[]" value="{{ $student->id }}" class="form-checkbox field-checkbox">
                                            <span>{{ $student->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('teamOne_students')
                                    <p class="form-error">Please select team 1 players.</p>
                                @enderror
                            </div>

                            <div class="form-field">
                                <label class="form-label">Team 2 Players</label>
                                <div class="team-list">
                                    @foreach($teamTwo as $student)
                                        <label class="flex items-center gap-3 bg-zinc-50 p-3 text-sm font-semibold text-zinc-700">
                                            <input type="checkbox" name="teamTwo_students[]" value="{{ $student->id }}" class="form-checkbox field-checkbox">
                                            <span>{{ $student->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('teamTwo_students')
                                    <p class="form-error">Please select team 2 players.</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <a href="/events" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
