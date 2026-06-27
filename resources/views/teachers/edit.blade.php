@extends('layouts.app')
@section('content')

<div class="form-container">
<form method="POST" action="/teachers/{{ $teacher->id }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
    <input
    type="text"
    name="name"
    class="form-control"
    value="{{ $teacher->name }}"><br></br>

    <input
    type="text"
    name="email"
    class="form-control"
    value="{{ $teacher->email }}"><br></br>

    <select name="department_id" class="form-control">

    @foreach($departments as $department)

        <option value="{{ $department->id }}"
            {{ $teacher->department_id == $department->id ? 'selected' : '' }}>

            {{ $department->name }}

        </option>

    @endforeach

</select>
</div>

   <div class="form-buttons">
      <button type="submit" class="submit-btn">Edit</button>
      <a href="/teachers" class="cancel-btn">Cancel</a>
   </div>

</form>
</div>
@endsection

    
