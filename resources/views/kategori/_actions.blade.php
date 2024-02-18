<a href="javascript:void(0)" data-toggle="modal" data-target="#ubah-kategori{{ $data->id }}"
    class="btn btn-sm btn-sm navbar-pink">Change</a>

<button class="btn btn-sm navbar-maroon navbar-light"
    onclick="if(confirm('Are you sure you want to delete?')) document.getElementById('delete-form-{{ $data->id }}').submit()">Delete</button>

<form action="{{ route('kategori.destroy', $data->id) }}" method="post" id="delete-form-{{ $data->id }}">
    @csrf
    @method('DELETE')
</form>


<div class="modal fade" id="ubah-kategori{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kategori.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="nama" id="name"
                            placeholder="Masukkan Nama" value="{{ $data->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Description</label>
                        <textarea class="form-control" name="deskripsi" rows="3" id="deskripsi" placeholder="Masukkan Deskripsi">{{ $data->deskripsi }}</textarea>
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
