@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
{{-- Title --}}
            <h1 class="page-title">Students</h1>
            <p class="page-subtitle">Student profiles and contact records.</p>
        </div>
        <div class="page-actions">
            <a href="/" class="btn btn-secondary">Back</a>
            <a href="/students/create" class="btn btn-primary">Add Student</a>
        </div>
    </div>
{{-- Student Search Bar  --}}
    <form action="/students" method="GET" class="mb-6 flex items-center gap-3">

        <input
        type="hidden"
        name="department_id"
        value="{{ request('department_id') }}">

       <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search student by name..."
        class="form-input field-input w-150">

       <button
        type="submit"
        class="btn btn-primary">
        Search
       </button>

       <a
        href="/students"
        class="btn btn-secondary">
        Reset
       </a>

    </form>

{{-- Alert message --}}
    @if(session('success'))
    <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3">
        {{ session('success') }}
    </div>
@endif

{{-- Select Department --}}
<div class="flex flex-wrap gap-3 mb-6">

    <a href="/students?search={{ request('search') }}"
       class="px-5 py-2 rounded-lg border font-medium
       {{ request('department_id') ? 'bg-white text-gray-700' : 'bg-blue-600 text-white' }}">
        All
    </a>

    @foreach($departments as $department)

        <a href="/students?department_id={{ $department->id }}&search={{ request('search') }}"
           class="px-5 py-2 rounded-lg border font-medium
           {{ request('department_id') == $department->id
               ? 'bg-blue-600 text-white'
               : 'bg-white text-gray-700 hover:bg-gray-100' }}">

            {{ $department->name }}

        </a>

    @endforeach

</div>

{{-- Student Table --}}
    <div class="table-shell">
        <div class="table-wrap">
            <table class="record-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Student Name</th>
                        <th>Email Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($students->count())
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            
                            <td>

                                @if($student->photo)

                                     <img
                                       src="{{ asset('storage/' . $student->photo) }}"
                                       width="70"
                                       height="70"
                                       style="border-radius:50%; object-fit:cover;">

                                  @else

                                   No Photo

                                @endif

                            </td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <div class="action-row">
                                    <a href="/students/{{ $student->id }}" class="action-link">Show</a>
                                    <a href="/students/{{ $student->id }}/edit" class="action-link">Edit</a>
                                    <form method="POST" action="/students/{{ $student->id }}"
                                        onsubmit="return confirm('Are you sure you want to delete this student?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center py-6 font-semibold text-gray-500">

                             No students found.

                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
