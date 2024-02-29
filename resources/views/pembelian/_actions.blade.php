<a href="{{ route('pembelian.show', $data->id) }}" class="btn btn-sm btn-primary">View</a>

<button class="btn btn-sm navbar-danger navbar-light"
    onclick="if(confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $data->id }}').submit()">Delete</button>

<form action="{{ route('pembelian.destroy', $data->id) }}" method="post" id="delete-form-{{ $data->id }}">
    @csrf
    @method('DELETE')
