@extends('layouts.app')
@section('content')

<div class="form-container">
<form method="POST" action="/departments/{{ $department->id }}">
    @csrf

    @method('PATCH')

    <input
        type="text"
        name="name"
        class="form-control"
        value="{{ $department->name }}">

     <div class="form-buttons">   
         <button  type="submit" class="submit-btn">Create</button>
         <a href="/departments" class="cancel-btn">Cancel</a>
     </div>  
    
</form>
@endsection