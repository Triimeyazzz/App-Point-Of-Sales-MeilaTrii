<a href="{{ route('supplier.edit', $data->id) }}" class="btn btn-sm btn-primary">Ubah</a>
<button class="btn btn-sm btn-danger"
    onclick="if(confirm('Anda Yakin ingin menghapus?')) document.getElementById('delete-form-{{ $data->id }}').submit()">Hapus</button>

<form action="{{ route('supplier.destroy', $data->id) }}" method="post" id="delete-form-{{ $data->id }}">
    @csrf
    @method('DELETE')
</form>