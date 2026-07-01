@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Student</h1>
            <p class="page-subtitle">Add a student profile and department assignment.</p>
        </div>
        <div class="page-actions">
            <a href="/students" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="content-panel">
        <div class="panel-body">
            <form method="POST" action="/students" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label">Student Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-input field-input" placeholder="Enter student name">
                        @error('name')
                            <p class="form-error">Please enter a valid student name.</p>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input field-input" placeholder="Enter email address">
                        @error('email')
                            <p class="form-error">Please enter a valid email address.</p>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label class="form-label">Department</label>
                        <select name="department_id" class="form-select field-input">
                            <option value="">Select Department</option>
                            @foreach($departments as $item)
                                <option value="{{ $item->id }}" {{ (int) old('department_id') === $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <p class="form-error">Please select a department.</p>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label class="form-label">Student Photo</label>
                        <input type="file" name="photo" id="photo" accept="image/*" class="form-input field-input">
                        @error('photo')
                            <p class="form-error">Please upload a valid image.</p>
                        @enderror
                        <img id="photo-preview" src="" alt="Student photo preview" class="hidden h-32 w-32 border border-zinc-300 object-cover">
                    </div>
                </div>

                <div class="form-footer">
                    <a href="/students" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Student</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('photo').addEventListener('change', function (event) {
            const [file] = event.target.files;
            const preview = document.getElementById('photo-preview');

            if (!file) {
                preview.src = '';
                preview.classList.add('hidden');
                return;
            }

            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        });
    </script>
@endsection
