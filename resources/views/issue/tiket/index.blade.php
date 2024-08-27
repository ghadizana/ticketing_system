@extends('layouts.app')
@section('title', 'Tiket')
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
                                <div class="container d-flex justify-content-between align-items-center">
                                    <h4 class="py-3 mb-0">Detail Tiket</h4>
                                    <a class="btn btn-primary" href="{{ route('tiket.create') }}">Tambah Tiket</a>
                                </div>

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table display" id="tableTiket">
                                            <thead class="table-dark">
                                                <tr class="text-start">
                                                    <th>Select</th>
                                                    <th>ID Tiket</th>
                                                    <th>Nama Proyek</th>
                                                    <th>Judul</th>
                                                    <th>Deskripsi</th>
                                                    <th>Kategori</th>
                                                    <th>Prioritas</th>
                                                    <th>Severity</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($tikets as $tiket)
                                                    <tr class="text-start">
                                                        <td><input type="checkbox"></td>
                                                        <td><a
                                                                href="{{ route('tiket.show', $tiket->idTiket) }}">{{ $tiket->idTiket }}</a>
                                                        </td>
                                                        <td>{{ $tiket->proyeks->namaProyek }}</td>
                                                        <td>{{ $tiket->judul }}</td>
                                                        <td>{{ $tiket->deskripsi }}</td>
                                                        <td>{{ $tiket->kategori }}</td>
                                                        <td>
                                                            @if ($tiket->prioritas === 'Urgent')
                                                                <span
                                                                    class="badge bg-label-danger me-1">{{ $tiket->prioritas }}</span>
                                                            @elseif ($tiket->prioritas === 'High')
                                                                <span
                                                                    class="badge bg-label-warning me-1">{{ $tiket->prioritas }}</span>
                                                            @elseif ($tiket->prioritas === 'Normal')
                                                                <span
                                                                    class="badge bg-label-success me-1">{{ $tiket->prioritas }}</span>
                                                            @elseif ($tiket->prioritas === 'Low')
                                                                <span
                                                                    class="badge bg-label-info me-1">{{ $tiket->prioritas }}</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-label-secondary me-1">{{ $tiket->prioritas }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $tiket->severity }}</td>
                                                        <td>{{ $tiket->created_at->format('d M Y') }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('tiket.show', $tiket->idTiket) }}"><i
                                                                            class="bx bx-edit-alt me-2"></i>Edit</a>
                                                                    <form
                                                                        action="{{ route('tiket.destroy', $tiket->idTiket) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                                            <i class="bx bx-trash me-2"></i>Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
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

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.3/b-3.1.1/b-colvis-3.1.1/b-html5-3.1.1/b-print-3.1.1/sl-2.0.4/datatables.min.js">
    </script>

    <script>
        var table = $('#tableTiket').DataTable({
            layout: {
                topEnd: [
                    'search',
                    'buttons',
                ],
            },
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]'
            },
            columns: [{
                    visible: true,
                    title: "Select",
                    exportable: false,
                },
                {
                    visible: true,
                    title: "ID Tiket"
                },
                {
                    visible: true,
                    title: "Nama Proyek"
                },
                {
                    visible: true,
                    title: "Judul"
                },
                {
                    visible: true,
                    title: "Deskripsi"
                },
                {
                    visible: true,
                    title: "Kategori"
                },
                {
                    visible: true,
                    title: "Prioritas"
                },
                {
                    visible: true,
                    title: "Severity"
                },
                {
                    visible: true,
                    title: "Tanggal Kirim"
                },
                {
                    visible: true,
                    title: "Aksi"
                }
            ],
            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: ':visible:not(:first-child)'
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible:not(:first-child)'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible:not(:first-child)'
                    }
                },
                'colvis',
            ],
        });
    </script>
@endpush
