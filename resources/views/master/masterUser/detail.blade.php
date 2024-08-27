@extends('layouts.app')
@section('title', 'Informasi Akun')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Informasi Akun /</span>
                            {{ $users->nama }}</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="{{ asset('storage/uploads/' . $users->image) }}"
                                                class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    <form action="{{ route('masterUser.update', $users->userId) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Id Karyawan</label>
                                                    <input class="form-control" name="idKaryawan"
                                                        value="{{ $users->idKaryawan }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Nama</label>
                                                    <input class="form-control" name="nama"
                                                        value="{{ $users->nama }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Username</label>
                                                    <input class="form-control" name="username"
                                                        value="{{ $users->username }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Email</label>
                                                    <input class="form-control" name="email"
                                                        value="{{ $users->email }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Nama Proyek</label>
                                                    <select name="idProyek" id="idProyek" class="form-select">
                                                        @foreach ($proyeks as $proyek)
                                                            <option value="{{ $proyek->idProyek }}"
                                                                @selected($users->idProyek == $proyek->idProyek)>
                                                                {{ $proyek->namaProyek }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Nama Department</label>
                                                    <input class="form-control" name="idDepartment"
                                                        value="{{ $users->idDepartment }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Nama Grup User</label>
                                                    <select name="role" class="form-select">
                                                        @foreach ($roles as $role)
                                                            <option @selected($users->hasRole($role->name))
                                                                value="{{ $role->name }}">
                                                                {{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Status Akun</label>
                                                    <select name="status" id="status" class="form-select">
                                                        <option value="1"
                                                            {{ old('status', $users->status) == '1' ? 'selected' : '' }}>
                                                            Aktif</option>
                                                        <option value="0"
                                                            {{ old('status', $users->status) == '0' ? 'selected' : '' }}>
                                                            Tidak Aktif</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-danger me-2"
                                                        onclick="window.history.back()">Batal</button>
                                                    <button type="submit" class="btn btn-success">Edit Akun</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
