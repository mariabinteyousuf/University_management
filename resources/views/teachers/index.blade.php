@extends('layouts.app')

@section('content')

<h1>Teachers</h1>

<div class="top-buttons">
<a href="/teachers/create" class="btn create-btn" >Add New Teacher</a>
<a href="/" class="btn back-btn">Back</a>
</div>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Teacher's Name</th>
        <th>Email Address</th>
        <th>Actions</th>
    </tr>

    @foreach($teachers as $teacher)

    <tr>
        <td>{{ $teacher->id }}</td>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->email }}</td>

        <td>

<a href="/teachers/{{ $teacher->id }}/edit" class="btn edit-btn">Edit</a> 
<a href="/teachers/{{ $teacher->id }}" class="btn show-btn">Show</a> 



<form method="POST" action="/teachers/{{ $teacher->id }}" class="inline-form">
    @csrf
   @method('DELETE')

    <button class="btn delete-btn"> Delete </button>
</form>

        </td>
    </tr>

@endforeach
</table>

@endsection