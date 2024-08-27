@extends('layouts.app')
@section('title', 'Menu')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                @include('layouts.topbar')
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Layout Demo -->
                        <div class="layout-demo-info">
                            <div class="layout-demo-placeholder">
                                {{-- Navbar Tambah Grup User --}}
                                <div class="container d-flex justify-content-between align-items-center">
                                    @include('master.menu.create')
                                    <h4 class="py-3 mb-0">Detail Menu</h4>
                                    <a class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#addMenu" href="{{ route('menu.store') }}">Tambah Menu</a>
                                </div>
                                {{-- End Navbar Tambah Grup User --}}

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Nama Menu</th>
                                                    <th>Link Tautan</th>
                                                    <th>Status</th>
                                                    <th>Label</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($menu as $item)
                                                    <tr>
                                                        <td>{{ $item->namaMenu }}</td>
                                                        <td><span
                                                                class="badge bg-label-success me-1">{{ $item->baseUrl }}</span>
                                                        </td>
                                                        <td>
                                                            @if ($item->status === 1)
                                                                <span class="badge bg-label-primary me-1">Aktif</span>
                                                            @else
                                                                <span class="badge bg-label-warning me-1">Tidak
                                                                    Aktif</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->label }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"
                                                                        data-bs-target="#modal-form-edit-menu-{{ $item->idMenu }}"
                                                                        data-bs-toggle="modal"><i
                                                                            class="bx bx-edit-alt me-2"></i>Edit</a>
                                                                    <form
                                                                        action="{{ route('menu.destroy', $item->idMenu) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                                            <i class="bx bx-trash me-2"></i>Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                @include('master.menu.edit')
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <th colspan="5" class="text-center">Tidak ada data untuk
                                                            ditampilkan</th>
                                                    </tr>
                                                @endforelse
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
