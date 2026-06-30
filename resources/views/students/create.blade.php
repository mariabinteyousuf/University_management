@extends('layouts.app')
@section('content')

<div class="form-container">
<form method="POST" action="/students" enctype="multipart/form-data">
    @csrf

   <div class="form-group">
    <input
    type="text"
    name="name"
    class="form-control"
    placeholder="Student Name"><br></br>
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

    <br></br>

    <label>Student Photo</label>

    <input
        type="file"
        name="photo"
        id="photo"
        accept="image/*">

    <img
    id="preview"
    src=""
    width="150"
    style="display:none;border:1px solid #ccc;">

    </div>


    <div class="form-buttons">
      <button type="submit" class="submit-btn">Create</button>
      <a href="/students" class="cancel-btn">Cancel</a>
    </div>  

</form>
</div>



<script>

document.getElementById('photo').addEventListener('change', function (e) {

    const file = e.target.files[0];

    if (file) {

        const reader = new FileReader();

        reader.onload = function (event) {

            document.getElementById('preview').src = event.target.result;

            document.getElementById('preview').style.display = 'block';

        }

        reader.readAsDataURL(file);

    }

});

</script>


@endsection

    
