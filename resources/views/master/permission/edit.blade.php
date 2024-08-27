<div class="modal fade" id="modal-form-edit-permission-{{ $permission->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="mb-3" action="{{ route('permission.update', $permission->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Izin</label>
                        <input type="text" id="name" class="form-control" name="name"
                            placeholder="Masukkan Nama Izin" autofocus required value="{{ $permission->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="guard_name" class="form-label">Nama Guard</label>
                        <input type="text" id="guard_name" class="form-control" name="guard_name"
                            placeholder="Masukkan Nama Guard" autofocus value="{{ $permission->guard_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" id="deskripsi" class="form-control" name="deskripsi"
                            placeholder="Masukkan Deskripsi" autofocus value="{{ $permission->deskripsi }}">
                    </div>
                    <div class="mb-3">
                        <label for="label" class="form-label">Label</label>
                        <input type="text" id="label" class="form-control" name="label"
                            placeholder="Masukkan Label" autofocus value="{{ $permission->label }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success ">Tambah Menu</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
