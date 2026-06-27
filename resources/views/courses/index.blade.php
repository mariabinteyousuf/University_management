@extends('layouts.app')
@section('content')

<h1>Courses</h1>

<div class="top-buttons">
<a href="/courses/create" class="btn create-btn" >Add New Course</a>
<a href="/" class="btn back-btn">Back</a>
</div>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Actions</th>
    </tr>

    @foreach($courses as $course)

    <tr>
        <td>{{ $course->id }}</td>
        <td>{{ $course->course_name }}</td>
        
        <td>

<a href="/courses/{{ $course->id }}/edit" class="btn edit-btn">Edit</a> 
<a href="/courses/{{ $course->id }}" class="btn show-btn">Show</a> 


<form method="POST" action="/courses/{{ $course->id }}" class="inline-form">
    @csrf
   @method('DELETE')

    <button class="btn delete-btn"> Delete </button>
</form>
 </td>
    </tr>
@endforeach
</table>
@endsection