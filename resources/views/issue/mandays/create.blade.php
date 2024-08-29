<div class="modal fade" id="addMandays" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="mb-3" action="{{ route('mandays.store') }}" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Mandays</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="route" class="form-label">Nama Proyek</label>
                        <select class="form-select" id="idProyek" name="idProyek" data-choices
                            data-choices-removeItem>
                            @foreach ($proyeks as $proyek)
                                <option value="{{ $proyek->idProyek }}">{{ $proyek->namaProyek }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="date" id="tahun" class="form-control" name="tahun"
                            placeholder="Masukkan Tahun" autofocus required value="{{ old('tahun') }}">
                    </div>
                    <div class="mb-3">
                        <label for="route" class="form-label">Mandays</label>
                        <input type="number" id="mandays" class="form-control" name="mandays"
                            placeholder="Masukkan Jumlah Mandays" autofocus required value="{{ old('mandays') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success ">Tambah Mandays</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
