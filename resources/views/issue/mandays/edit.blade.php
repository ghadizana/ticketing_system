<!-- Modal -->
<div class="modal fade" id="modal-form-edit-mandays-{{ $item->idMandays }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Mandays</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mandays.update', $item->idMandays) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="mb-3">
                            <label for="idProyek" class="form-label">Nama Proyek</label>
                            <select class="form-select" id="idProyek" name="idProyek" data-choices
                                data-choices-removeItem>
                                @foreach ($proyeks as $proyek)
                                    <option value="{{ $item->idProyek }}">{{ $proyek->namaProyek }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="date" class="form-control" id="tahun" name="tahun"
                                value="{{ $item->tahun }}" />
                        </div>
                        <div class="mb-3">
                            <label for="mandays" class="form-label">Mandays</label>
                            <input class="form-control" id="mandays" name="mandays" value="{{ $item->mandays }}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            onclick="window.history.back()">Batal</button>
                        <button type="submit" class="btn btn-success me-2">Edit Mandays</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
