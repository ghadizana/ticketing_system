<div class="modal fade" id="modal-form-edit-proyek-{{ $item->idProyek }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAuthentication" class="mb-3" action="{{ route('proyek.update', $item->idProyek) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="namaProyek">Nama Proyek</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="namaProyek"
                                    placeholder="Masukkan nama proyek" autofocus required
                                    value="{{ $item->namaProyek }}" />
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
                                <select class="form-select" name="tipeRs" required>
                                    <option value="A" {{ old('tipeRs') == 'A' ? 'selected' : '' }}>Tipe A</option>
                                    <option value="B" {{ old('tipeRs') == 'B' ? 'selected' : '' }}>Tipe B</option>
                                    <option value="C" {{ old('tipeRs') == 'C' ? 'selected' : '' }}>Tipe C</option>
                                    <option value="D" {{ old('tipeRs') == 'D' ? 'selected' : '' }}>Tipe D</option>
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
                                <input type="text" class="form-control" name="group" placeholder="Pilih Group"
                                    autofocus value="{{ old('group', $item->group) }}" />
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
                                    placeholder="Masukkan Nama Group" autofocus
                                    value="{{ old('namaGroup', $item->namaGroup) }}" />
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
                                <input type="date" name="tglMulai" class="form-control" id="basic-default-tglMulai"
                                    value="{{ old('tglMulai', $item->tglMulai ? \Carbon\Carbon::parse($item->tglMulai)->format('Y-m-d') : '') }}" />
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
                                <input type="date" name="tglMulai" class="form-control" id="basic-default-tglMulai"
                                    value="{{ old('tglMulai', $item->tglMulai ? \Carbon\Carbon::parse($item->tglMulai)->format('Y-m-d') : '') }}" />
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
                                <select class="form-select" name="konsepKerjasama" required>
                                    <option value="A" {{ old('konsepKerjasama') == 'Lising' ? 'selected' : '' }}>Tipe A</option>
                                    <option value="B" {{ old('konsepKerjasama') == 'Beli Putus' ? 'selected' : '' }}>Tipe B</option>
                                    <option value="C" {{ old('konsepKerjasama') == 'Sewa' ? 'selected' : '' }}>Tipe C</option>
                                    <option value="D" {{ old('konsepKerjasama') == 'KSO' ? 'selected' : '' }}>Tipe D</option>
                                </select>
                            </div>
                            @error('konsepKerjasama')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="alamat">Alamat</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="alamat"
                                    placeholder="Masukkan alamat" autofocus required value="{{ old('alamat', $item->alamat) }}" />
                            </div>
                            @error('alamat')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Tambah Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>
