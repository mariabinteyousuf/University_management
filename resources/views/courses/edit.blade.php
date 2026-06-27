@extends('layouts.app')
@section('content')

<div class="form-container">
<form method="POST" action="/courses/{{ $course->id }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
    <input
    type="text"
    name="course_name"
    class="form-control"
    value="{{ $course->course_name }}"><br></br>


    <select name="department_id" class="form-control">

    @foreach($departments as $department)

        <option
            value="{{ $department->id }}"
            {{ $course->department_id == $department->id ? 'selected' : '' }}>

            {{ $department->name }}

        </option>

    @endforeach

  </select><br></br>


   <select name="teacher_id" class="form-control">

    @foreach($teachers as $teacher)

        <option
            value="{{ $teacher->id }}"
            {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>

            {{ $teacher->name }}

        </option>

    @endforeach

  </select><br></br>
    </div>



    <div class="form-buttons">
    <button type="submit" class="submit-btn">Edit</button>
    <a href="/courses" class="cancel-btn">Cancel</a>

</form>
</div>
@endsection

    
