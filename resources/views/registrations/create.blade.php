@extends('layouts.app')
@section('content')


<div class="form-container">
<form method="POST" action="/registrations">
    @csrf
    
  <div class="form-group">
  <select name="student_id" class="form-control" >

        <option value="">
            Select Student
        </option>

        @foreach($students as $student)

            <option value="{{ $student->id }}">
                {{ $student->name }}
            </option>

        @endforeach

    </select>
    <br><br>

     @error('student_id')
        <p class="error">Please select a student!</p>
    @enderror


      <select name="course_id" class="form-control">

        <option value="">
            Select Course
        </option>

        @foreach($courses as $course)

            <option value="{{ $course->id }}">
                {{ $course->course_name }}
            </option>

        @endforeach

    </select><br><br>
   @error('course_id')
        <p class="error">Please select a course!</p>
    @enderror


    <input
    type="text"
    name="semester"
    class="form-control"
    placeholder="Semester"><br></br>
     @error('semester')
        <p class="error">Please enter a semester!</p>
    @enderror

  </div>  

  <div class="form-buttons">
     <button type="submit" class="submit-btn">Create</button>
     <a href="/registrations" class="cancel-btn">Cancel</a>
  </div> 
</form>
</div>
@endsection