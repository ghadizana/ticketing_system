@extends('layouts.app')
@section('title', 'Proyek')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                @include('layouts.topbar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Layout Demo -->
                        <div class="layout-demo-info">
                            <div class="layout-demo-placeholder">
                                {{-- Navbar Tambah Grup User --}}
                                <div class="container d-flex justify-content-between align-items-center">
                                    @include('issue.proyek.create')
                                    <h4 class="py-3 mb-0">Detail Proyek</h4>
                                    <a class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#addProyek" href="">Tambah Proyek</a>
                                </div>
                                {{-- End Navbar Tambah Grup User --}}

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table small-font-size">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Nama Proyek</th>
                                                    <th>Tipe RS</th>
                                                    <th>Group</th>
                                                    <th>Nama Group</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Akhir</th>
                                                    <th>Konsep Kerjasama</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-start">
                                                @forelse ($proyek as $item)
                                                    <tr>
                                                        <td>{{ $item->namaProyek }}</td>
                                                        <td><span class="badge bg-label-success me-1">Tipe
                                                                {{ $item->tipeRs }}</span>
                                                        </td>
                                                        <td>
                                                            @if ($item->group === 1)
                                                                <span class="badge bg-label-primary me-1">Group</span>
                                                            @else
                                                                <span class="badge bg-label-primary me-1">Bukan Group</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->namaGroup }}</td>
                                                        <td>{{ $item->tglMulai }}</td>
                                                        <td>{{ $item->tglAkhir }}</td>
                                                        <td><span
                                                                class="badge bg-label-info me-1">{{ $item->konsepKerjasama }}</span>
                                                        </td>
                                                        <td>{{ $item->alamat }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"
                                                                        data-bs-target="#modal-form-edit-proyek-{{ $item->idProyek }}"
                                                                        data-bs-toggle="modal"><i
                                                                            class="bx bx-edit-alt me-2"></i>Edit</a>
                                                                    <form
                                                                        action="{{ route('proyek.destroy', $item->idProyek) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                                            <i class="bx bx-trash me-2"></i>Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                @include('issue.proyek.edit')
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <th colspan="9" class="text-center">Tidak ada data untuk
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
