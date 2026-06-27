@extends('layouts.app')

@section('content')


<div class="form-container">
<form method="POST" action="/courses">
    @csrf

    <div class="form-group">
    <input
    type="text"
    name="course_name"
    class="form-control"
    placeholder="Course Name"><br></br>
     @error('course_name')
        <p class="error">Please enter an email address.</p>
    @enderror


  <select name="department_id" class="form-control">

        <option value="">
            Select Department
        </option>

        @foreach($departments as $department)

            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>

        @endforeach

    </select><br></br>

     @error('department_id')
        <p class="error">Please select a department!</p>
    @enderror
    

    <select name="teacher_id" class="form-control">

        <option value="">
            Select Teacher
        </option>

        @foreach($teachers as $teacher)

            <option value="{{ $teacher->id }}">
                {{ $teacher->name }}
            </option>

        @endforeach

    </select>

     @error('teacher_id')
        <p class="error">Please select a teacher!</p>
    @enderror

    </div>


    <div class="form-buttons">
       <button type="submit" class="submit-btn">Create</button>
       <a href="/courses" class="cancel-btn">Cancel</a>
    </div>
</form>
</div>
@endsection
    
