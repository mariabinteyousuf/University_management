@extends('layouts.app')
@section('content')

<div class="form-container">
<form method="POST" action="/registration/{{ $registration->id }}">
    @csrf
    @method("PATCH")

   <div class="form-group">
   <select name="student_id" class="form-control">

        @foreach($students as $student)

            <option
                value="{{ $student->id }}"
                {{ $registration->student_id == $student->id ? 'selected' : '' }}>

                {{ $student->name }}

            </option>

        @endforeach

    </select>

    <br><br>

     <select name="course_id" class="form-control">

        @foreach($courses as $course)

            <option
                value="{{ $course->id }}"
                {{ $registration->course_id == $course->id ? 'selected' : '' }}>

                {{ $course->course_name }}

            </option>

        @endforeach

    </select><br><br>
   </div>


    <input
    type="text"
    name="semester"
    class="form-control"
    value="{{ $registration->semester }}"><br></br>

    <div class="form-buttons">
       <button type="submit" class="submit-btn">Edit</button>
       <a href="/registrations" class="cancel-btn">Cancel</a>
    </div>   
    
</form>
</div>
@endsection