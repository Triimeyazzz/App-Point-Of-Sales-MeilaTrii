<a href="javascript:void(0)" data-toggle="modal" data-target="#ubah-brand{{ $data->id }}"
    class="btn btn-sm navbar-purple">Update</a>

<button class="btn btn-sm btn-danger"
    onclick="if(confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $data->id }}').submit()">Hapus</button>

<form action="{{ route('brand.destroy', $data->id) }}" method="post" id="delete-form-{{ $data->id }}">
    @csrf
    @method('DELETE')
</form>


<div class="modal fade" id="ubah-brand{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('brand.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Brand</label>
                        <input type="text" class="form-control" name="nama" id="name"
                            placeholder="Masukkan Nama" value="{{ $data->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="3" id="deskripsi" placeholder="Masukkan Deskripsi">{{ $data->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
