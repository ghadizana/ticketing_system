<!-- Modal -->
<div class="modal fade" id="modal-form-edit-menu-{{ $item->idMenu }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menu.update', $item->idMenu) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="namaMenu" class="form-label">Nama Menu</label>
                            <input class="form-control" id="namaMenu" name="namaMenu" value="{{ $item->namaMenu }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="linkTautan" class="form-label">Link Tautan</label>
                            <select class="form-control" id="baseUrl" name="baseUrl">
                            @foreach ($facadesMenus as $facadesMenu)
                                @if (!blank($facadesMenu->getName()))
                                <option @selected($item->permission_name == $facadesMenu->getName()) value="{{ $facadesMenu->getName() }}">{{ $facadesMenu->getName() }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <div class="input-group">
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Tidak Aktif
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="label" class="form-label">Label</label>
                            <input class="form-control" id="label" name="label" value="{{ $item->label }}" />
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan
                                perubahan</button>
                            <button type="button" class="btn btn-outline-secondary"
                                onclick="window.history.back()">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
