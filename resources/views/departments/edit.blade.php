<form method="POST" action="/departments/{{ $department->id }}"
> @csrf

    @method('PATCH')

    <input
        type="text"
        name="name"
        value="{{ $department->name }}"
    >
    <button>Update</button>
    <a href="/departments">Cancel</a>
    
</form>