<form method="POST" action="/departments">
    @csrf

    <input 
    type="text"
    name="name"
    placeholder="Department Name">


    <button> Create</button>
    <a href="/departments">Cancel</a>

</form>    