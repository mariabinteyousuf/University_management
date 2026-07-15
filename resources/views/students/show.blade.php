@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div>
            {{-- Title --}}
            <h1 class="page-title">Student Details</h1>
            <p class="page-subtitle">Student profile overview.</p>
        </div>
           {{-- Back and Edit button --}}
        <div class="page-actions">
            <a href="/students" class="btn btn-secondary">Back</a>
            <a href="/students/{{ $student->id }}/edit" class="btn btn-primary">Edit Student</a>
        </div>
    </div>
           {{--  Student details --}}
  <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

              {{-- Top Banner --}}
     <div class="h-40 bg-gradient-to-r from-blue-600 to-indigo-600"></div>
        <div class="px-8 pb-8">
               {{-- Profile Photo --}}
            <div class="mt-20 flex justify-center">
               @if($student->photo)
                 <img
                  src="{{ asset('storage/'.$student->photo) }}"
                  class="w-40 h-40 rounded-full border-4 border-white shadow-lg object-cover"
                  >

                @else
                   <div class="w-40 h-40 rounded-full border-4 border-white shadow-lg bg-gray-200 flex items-center justify-center text-gray-500">
                        No Photo
                   </div>
                @endif
            </div>

            {{-- Name --}}
            <div class="mt-5">
                <h2 class="text-3xl font-bold text-gray-800">
                    {{ $student->name }}
                </h2>
                <p class="text-gray-500">
                    Student ID:{{ $student->id }}
                </p>
            </div>

            {{-- Information --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
                <div> 
                    <p class="text-gray-500 text-sm">Email</p>

                    <p class="text-lg font-semibold">
                    {{ $student->email }}
                    </p>

                </div>

                <div>
                   <p class="text-gray-500 text-sm">Department</p>

                   <p class="text-lg font-semibold">
                      {{ $student->department->name }}
                  </p>
                </div>

                <div>
                    <p class="text-gray-500 text-sm">Registration Date</p>

                     @if($student->registrations->count())
                        <p class="text-lg font-semibold">
                         {{ $student->registrations->first()->created_at->format('d M Y') }}
                        </p>
                      @else
                        <p class="text-gray-400">
                          Not Registered
                        </p>
                      @endif
                </div>

            </div>

            

        </div>
    </div>
@endsection
