@extends('layouts.app')

@section('content')

<h1>Students</h1>

<div class="top-buttons">
<a href="/students/create" class="btn create-btn">Add New Student</a>
<a href="/" class="btn back-btn">Back</a>
</div>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Student's Email Address</th>
        <th>Actions</th>

    </tr>

    @foreach($students as $student)

    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        
 <td> 

    <a href="/students/{{ $student->id }}/edit" class="btn edit-btn">Edit</a> 
    <a href="/students/{{ $student->id }}" class="btn show-btn">Show</a> 



  <form method="POST" action="/students/{{ $student->id }}" class="inline-form">
      @csrf
     @method('DELETE')

      <button class="btn delete-btn"> Delete </button>
   </form>
</td>
</tr>

@endforeach
</table>
@endsection