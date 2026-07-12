@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Student</h1>
            <p class="page-subtitle">Update student profile information.</p>
        </div>
        <div class="page-actions">
            <a href="/students" class="btn btn-secondary">Back</a>
        </div>
    </div>

    {{-- Alert message --}}
    @if(session('success'))
    <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3">
        {{ session('success') }}
    </div>
    @endif

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/students/{{ $student->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-grid">
                    <div class="form-field">

                          <label class="form-label">Current Photo</label>

                           @if($student->photo)

                                   <img
                                      src="{{ asset('storage/'.$student->photo) }}"
                                      width="120"
                                      height="120"
                                      class="rounded-full object-cover border shadow">

                            @else

                             <p>No Photo</p>

                            @endif
                    </div>

                    {{-- Edit form --}}
                    <div class="form-field">
                        <label class="form-label">Student Name</label>
                        <input type="text" name="name" class="form-input field-input" value="{{ $student->name }}">
                    </div>

                    <div class="form-field">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input field-input" value="{{ $student->email }}">
                    </div>

                    <div class="form-field">
                        <label class="form-label">Department</label>
                        <select name="department_id" class="form-select field-input">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ $student->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-field">

                        <label class="form-label">
                                    Change Photo
                        </label>

                        <input
                           type="file"
                           name="photo"
                           id="photo"
                           class="form-input field-input"
                           accept="image/*">

                       @error('photo')
                       <p class="form-error">{{ $message }}</p>
                       @enderror
                    </div>
                                  
                </div>
                        {{-- Cancel and Update Button --}}
                <div class="form-footer">
                    <a href="/students" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
            </form>
        </div>
    </div>

               {{-- Change profile photo --}}
   <script>
       document.getElementById('photo').addEventListener('change', function(e){

        const file = e.target.files[0];

       if(file){

        document.getElementById('preview').src =
            URL.createObjectURL(file);

      }

     });

    </script>
@endsection
