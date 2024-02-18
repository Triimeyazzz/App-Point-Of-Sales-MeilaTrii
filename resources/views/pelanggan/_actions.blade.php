<a href="{{ route('pelanggan.edit', $data->id) }}" class="btn btn-sm btn-sm navbar-pink">Change</a>
<button class="btn btn-sm navbar-maroon navbar-light"
    onclick="if(confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $data->id }}').submit()">Delete</button>

<form action="{{ route('pelanggan.destroy', $data->id) }}" method="post" id="delete-form-{{ $data->id }}">
    @csrf
    @method('DELETE')
</form>
