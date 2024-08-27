<div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="mb-3" action="{{ route('menu.store') }}" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="route" class="form-label">Nama Menu</label>
                        <select name="namaMenu" id="route" class="form-control">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="permission_name" class="form-label">Link Tautan</label>
                        <select class="form-control" id="baseUrl" name="baseUrl">
                            @foreach ($facadesMenus as $facadeMenu)
                            @if (!blank($facadeMenu->getName()))
                                <option value="{{ $facadeMenu->getname() }}">{{ $facadeMenu->getname() }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Label</label>
                        <textarea type="text" class="form-control" id="description" placeholder="Masukkan Label" name="label"></textarea>
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