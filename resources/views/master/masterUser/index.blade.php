@extends('layouts.app')
@section('title', 'Master User')
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
                                    <h4 class="py-3 mb-0">Detail Pengguna</h4>
                                    @include('master.masterUser.create')
                                    <a class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#addUser" href="#">Tambah Akun</a>
                                </div>

                                <div class="card mb-3">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Nama User</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Nama Proyek</th>
                                                    <th>Grup User</th>
                                                    <th>Status Pengguna</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($masterUsers as $user)
                                                    <tr>
                                                        <td class="text-start">{{ $user->nama }}</td>
                                                        <td class="text-start">{{ $user->username }}</td>
                                                        <td class="text-start">{{ $user->email }}</td>
                                                        <td class="text-start">
                                                            {{ $user->proyek ? $user->proyek->namaProyek : 'N/A' }}</td>
                                                        <td class="text-start">
                                                            @foreach ($user->roles as $grupUser)
                                                                {{ $grupUser->name }}
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @if ($user->status === 1)
                                                                <span class="badge bg-label-primary me-1">Aktif</span>
                                                            @else
                                                                <span class="badge bg-label-warning me-1">Tidak
                                                                    Aktif</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('masterUser.show', $user->userId) }}"><i
                                                                            class="bx bx-user me-2"></i>Detail Akun</a>
                                                                    <form action="{{ route('masterUser.destroy', $user->userId) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" id="confirm-text"
                                                                            class="dropdown-item"
                                                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                                            <i class="bx bx-trash me-2"></i>Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                {{-- @include('master.masterUser.edit') --}}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <th colspan="5" class="text-center">No data to display</th>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <nav aria-label="..." class="pagination justify-content-end">
                                    {{ $masterUsers->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
