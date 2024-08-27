<!-- Modal -->
<div id="modal-form-edit-user-{{ $user->userId }}" class="modal fade" tabindex="-1"
    aria-labelledby="modal-form-edit-user-{{ $user->userId }}-label" aria-hidden="true" style="display: none;">
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
            <form action="{{ route('masterUser.update', $user->userId) }}" method="post">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-edit-user-{{ $user->userId }}-label">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="username">Username</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="username"
                                    placeholder="Masukkan username anda" autofocus required
                                    value="{{ $user->username }}" />
                            </div>
                            @error('username')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="name">Nama</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="nama"
                                    placeholder="Masukkan nama anda" autofocus required value="{{ $user->nama }}" />
                            </div>
                            @error('nama')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="email">Email</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Masukkan email anda" autofocus required value="{{ $user->email }}" />
                            </div>
                            @error('email')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idProyek">Nama Proyek</label>
                        <div class="col-sm-9">
                            <select name="idProyek" name="idProyek" class="form-control">
                                <option value="" disabled>Pilih Nama Proyek</option>
                                @foreach ($proyeks as $proyek)
                                    <option value="{{ $proyek->idProyek }}" {{ $proyek->idProyek == $proyek->idProyek ? 'selected' : '' }}>
                                        {{ $proyek->namaProyek }}
                                    </option>
                                @endforeach
                            </select>
                            @error('namaProyek')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idKaryawan">ID Karyawan</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idKaryawan"
                                    placeholder="Masukkan id karyawan anda" autofocus required
                                    value="{{ $user->idKaryawan }}" />
                            </div>
                            @error('idKaryawan')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="grupUser">Grup User</label>
                        <div class="col-sm-9">
                            <select name="role" name="role" class="form-control">
                                <option value="" disabled>Pilih Grup User</option>
                                @foreach ($roles as $role)
                                    <option @selected($user->hasRole($role->name)) value="{{ $role->name }}">
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idGrupUser')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idDepartment">ID Department</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idDepartment"
                                    placeholder="Masukkan id department anda" autofocus required
                                    value="{{ $user->idDepartment }}" />
                            </div>
                            @error('idDepartment')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="formFile">Foto Pengguna</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="file" class="form-control" name="fotoPengguna" autofocus
                                    value="{{ $user->image }}" />
                            </div>
                        </div>
                        @error('image')
                            <div class="text text-danger text-start">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success ">Update</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
