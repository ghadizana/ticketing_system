<div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAuthentication" class="mb-3" action="{{ route('masterUser.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="username">Username</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="username"
                                    placeholder="Masukkan username anda" autofocus required
                                    value="{{ old('username') }}" />
                            </div>
                            @error('username')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 form-password-toggle">
                        <label class="col-sm-3 col-form-label text-start" for="password">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" autofocus required value="{{ old('password') }}" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('password')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="name">Nama</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="nama"
                                    placeholder="Masukkan nama anda" autofocus required value="{{ old('nama') }}" />
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
                                    placeholder="Masukkan email anda" autofocus required value="{{ old('email') }}" />
                            </div>
                            @error('email')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="statusUser">Status User</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <select name="statusUser" id="statusUser" class="form-select">
                                    <option value="" disabled selected>Status User</option>
                                    <option value="1">Karyawan</option>
                                    <option value="0">Client</option>   
                                </select>
                            </div>
                            @error('email')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idProyek">Nama Proyek</label>
                        <div class="col-sm-9">
                            <select name="idProyek" name="idProyek" class="form-select">
                                <option value="" disabled selected>
                                    Pilih Proyek</option>
                                @foreach ($proyeks as $proyek)
                                    <option value="{{ $proyek->idProyek }}">
                                        {{ $proyek->namaProyek }}
                                    </option>
                                @endforeach
                            </select>
                            @error('idGrupUser')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="idKaryawan">Id Karyawan</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idKaryawan"
                                    placeholder="Masukkan id karyawan anda" autofocus
                                    value="{{ old('idKaryawan') }}" />
                            </div>
                            @error('idKaryawan')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="grupUser">Grup User</label>
                        <div class="col-sm-9">
                            <select name="role" name="role" class="form-select">
                                <option value="" disabled selected>
                                    Pilih Menu</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">
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
                        <label class="col-sm-3 col-form-label text-start" for="idDepartment">Id Department</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="idDepartment"
                                    placeholder="Masukkan id department anda" autofocus required
                                    value="{{ old('idDepartment') }}" />
                            </div>
                            @error('idDepartment')
                                <div class="text text-danger text-start">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label text-start" for="formFile">Foto Pengguna</label>
                        <div class="col-sm-9">
                            <input type="file" class="filepond" name="image" autofocus/>
                        </div>
                        @error('image')
                            <div class="text text-danger text-start">{{ $message }}</div>
                        @enderror
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