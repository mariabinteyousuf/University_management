@extends('layouts.app')
@section('content')

<div class="form-container">
<form method="POST" action="/teachers">
    @csrf

    <div class="form-group">
    <input
    type="text"
    name="name"
    class="form-control"
    placeholder="Teacher Name"><br></br>

    @error('name')
        <p class="error">Please enter a name!</p>
    @enderror


    <input
    type="email"
    name="email"
    class="form-control"
    placeholder="Email"><br></br>

    @error('email')
        <p class="error">Please enter an email address!</p>
    @enderror

   
    <select name="department_id" class="form-control">

        <option value="">Select Department</option>

        @foreach($departments as $department)

            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>

        @endforeach

    </select>

      @error('department_id')
        <p class="error">Please select a department!</p>
    @enderror

    </div>

 
    <div class="form-buttons">
       <button type="submit" class="submit-btn">Create</button>
      <a href="/teachers" class="cancel-btn">Cancel</a>
    </div>

</form>
</div>
@endsection


    
