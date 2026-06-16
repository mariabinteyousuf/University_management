<h1>Departments</h1>

<a href="/departments/create">Create New Department</a>


<ul>
    @foreach ($departments as $department )
    <li>{{ $department->name }}</li>
       
    @endforeach
</ul>    



@foreach($departments as $department)

<li>

{{ $department->name }}

<a href="/departments/{{ $department->id }}/edit">Edit</a> 
<a href="/departments/{{ $department->id }}/edit">Show</a> 



<form method="POST" action="/departments/{{ $department->id }}">
    @csrf
   @method('DELETE')

    <button> Delete </button>
</form>

</li>

@endforeach