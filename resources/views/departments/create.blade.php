@extends('layouts.app')
@section('content')

<div class="form-container">
<form method="POST" action="/departments">
    @csrf

    <div class="form-group">
    <input 
    type="text"
    name="name"
    class="form-control"
    placeholder="Department Name">

     @error('name')
        <p class="error">Please enter a department's name!</p>
    @enderror
    </div>

    <div class="form-buttons">
       <button type="submit" class="submit-btn"> Create</button>
       <a href="/departments" class="cancel-btn">Cancel</a>
    </div>   

</form>    
</div>
@endsection