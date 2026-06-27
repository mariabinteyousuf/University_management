@extends('layouts.app')

@section('content')

<h1>Departments</h1>

<div class="top-buttons">
<a href="/departments/create" class="btn create-btn">Add New Department</a>
<a href="/" class="btn back-btn">Back</a>
</div>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Department Name</th>
        <th>Actions</th>
    </tr>

    @foreach($departments as $department)

    <tr>
        <td>{{ $department->id }}</td>
        <td>{{ $department->name }}</td>
<td>

<a href="/departments/{{ $department->id }}/edit" class="btn edit-btn">Edit</a> 
<a href="/departments/{{ $department->id }}" class="btn show-btn">Show</a> 



<form method="POST" action="/departments/{{ $department->id }}" class="inline-form">
    @csrf
   @method('DELETE')

    <button class="btn delete-btn"> Delete </button>
</form>
</td>
    </tr>

@endforeach
</table>
@endsection