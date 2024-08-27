@extends('layouts.app')
@section('title', 'Grup User')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.sidebar')
            <div class="layout-page">
                @include('layouts.topbar')
                <div class="content-wrapper">
                    <div class="container-fluid w-100 flex-grow-1 container-p-y">
                        <div class="layout-demo-info">
                            <div class="layout-demo-placeholder">

                                <div class="container d-flex justify-content-between align-items-center">
                                    @include('master.grupUser.create')
                                    <h4 class="py-3 mb-0">Detail Grup User</h4>
                                    <a class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#addGrupUser" href="{{ route('grup-user.store') }}">Tambah
                                        Grup User</a>
                                </div>

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th class="text-start">Grup User</th>
                                                    <th class="text-start">Akses Menu</th>
                                                    <th class="text-start">Deskripsi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($grupUsers as $grupUser)
                                                    <tr>
                                                        <td class="text-start">{{ $grupUser->name }}</td>
                                                        <td class="text-start">
                                                            @foreach ($grupUser->permissions as $permission)
                                                                {{ $permission->name }}, 
                                                            @endforeach
                                                        </td>
                                                        <td class="text-start">{{ $grupUser->deskripsi }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modal-form-edit-role-{{ $grupUser->id }}"><i
                                                                            class="bx bx-edit-alt me-2"></i>Edit</a>
                                                                    <form
                                                                        action="{{ route('grup-user.destroy', $grupUser->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                                            <i class="bx bx-trash me-2"></i>Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                @include('master.grupUser.edit')
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Layout Demo -->
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
