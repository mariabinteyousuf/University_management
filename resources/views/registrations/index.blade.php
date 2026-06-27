@extends('layouts.app')

@section('content')

<h1>Registrations</h1>

<div class="top-buttons">
<a href="/registrations/create" class="btn create-btn">Add New Registration</a>
<a href="/" class="btn back-btn">Back</a>
</div>
<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Student ID</th>
        <th>Course ID</th>
        <th>Semester</th>
        <th>Actions</th>
    </tr>

    @foreach($registrations as $registration)

    <tr>
        <td>{{ $registration->id }}</td>
        <td>{{ $registration->student_id }}</td>
        <td>{{ $registration->course_id }}</td>
        <td>{{ $registration->semester }}</td>

        <td>

            <a href="/registrations/{{ $registration->id }}/edit" class="btn edit-btn">Edit</a>
            <a href="/registrations/{{ $registration->id }}" class="btn show-btn">Show</a>

            <form method="POST"
                  action="/registrations/{{ $registration->id }}"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn delete-btn"> Delete</button>

            </form>

        </td>

    </tr>

    @endforeach

</table>
@endsection