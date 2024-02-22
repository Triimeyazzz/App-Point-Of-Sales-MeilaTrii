<a href="javascript:void(0)" data-toggle="modal" data-target="#ubah-unit{{ $data->id }}"
    class="btn btn-sm btn-primary">Change</a>

<button class="btn btn-sm btn-danger"
    onclick="if(confirm('Anda yakin ingin menghapus?')) document.getElementById('delete-form-{{ $data->id }}').submit()">Hapus</button>

<form action="{{ route('unit.destroy', $data->id) }}" method="post" id="delete-form-{{ $data->id }}">
    @csrf
    @method('DELETE')
</form>


<div class="modal fade" id="ubah-unit{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Unit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('unit.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name Unit</label>
                        <input type="text" class="form-control" name="nama" id="name"
                            placeholder="Masukkan Nama" value="{{ $data->nama }}" required>
                    </div>
                    <div class="form-group">Abbreviated</label>
                        <input type="text" class="form-control" name="singkatan" id="singkatan"
                            placeholder="Masukkan Singkatan" value="{{ $data->singkatan }}" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
