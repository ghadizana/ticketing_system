<div class="modal fade" id="addProyek" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAuthentication" class="mb-3" action="{{ route('proyek.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="namaProyek">Nama Proyek</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="namaProyek"
                                    placeholder="Masukkan nama proyek" autofocus required value="{{ old('namaProyek') }}"/>
                            </div>
                            @error('namaProyek')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="name">Tipe RS</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <select class="form-control" name="tipeRs" required>
                                    <option value="">Pilih Tipe RS</option>
                                    <option value="A">Tipe A</option>
                                    <option value="B">Tipe B</option>
                                    <option value="C">Tipe C</option>
                                    <option value="D">Tipe D</option>
                                </select>
                            </div>
                            @error('tipeRs')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="name">Group</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="group"
                                    placeholder="Pilih Group" autofocus value="{{ old('group') }}" />
                            </div>
                            @error('group')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="namaGroup">Nama Group</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="namaGroup"
                                    placeholder="Masukkan Nama Group" autofocus value="{{ old('namaGroup') }}" />
                            </div>
                            @error('namaGroup')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="tglMulai">Tanggal Mulai</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" name="tglMulai" autofocus required value="{{ old('tglMulai') }}" />
                            </div>
                            @error('tglMulai')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="tglAkhir">Tanggal Akhir</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" name="tglAkhir" autofocus required value="{{ old('tglAkhir') }}" />
                            </div>
                            @error('tglAkhir')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="konsepKerjasama">Konsep Kerjasama</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <select class="form-control" name="konsepKerjasama" required>
                                    <option value="" disabled>Pilih Konsep Kerjasama</option>
                                    <option value="Lising">Lising</option>
                                    <option value="Beli Putus">Beli Putus</option>
                                    <option value="KSO">KSO</option>
                                    <option value="Sewa">Sewa</option>
                                </select>
                            </div>
                            @error('tipeRs')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="alamat">Alamat</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="alamat"
                                    placeholder="Masukkan alamat" autofocus required value="{{ old('alamat') }}" />
                            </div>
                            @error('alamat')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Tambah Proyek</button>
                </div>
            </form>
        </div>
    </div>
</div>
