<div class="modal fade" id="addGrupUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('grup-user.store') }}" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-add-role-label">Tambah Grup User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Grup User</label>
                        <input type="text" class="form-control" id="name" placeholder="Grup User"
                            name="name">
                    </div>

                    <div class="mb-3">
                        <label for="permissions[]" class="form-label">Nama Akses</label>
                        <div class="d-flex flex-wrap">
                            @foreach ($permissions as $permission)
                                <div class="d-flex align-items-center mb-3" style="width: 50%;">
                                    <input class="form-check-input me-2" type="checkbox" name="permissions[]" value="{{ $permission->name }}"/>
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea type="text" class="form-control" id="description" placeholder="Deskripsi" name="Deskripsi"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success ">Tambah Grup User</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div>
</div>
