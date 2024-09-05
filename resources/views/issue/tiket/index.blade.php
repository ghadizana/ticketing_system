@extends('layouts.app')
@section('title', 'Tiket')
@section('content')
    <div class="container d-flex justify-content-between align-items-center">
        <h4 class="py-3 mb-0">Detail Tiket</h4>
        @if (Auth::user()->statusUser == 0)
            <a class="btn btn-primary" href="{{ route('userTiket.create') }}">Tambah Tiket</a>
        @else
            <a class="btn btn-primary" href="{{ route('tiket.create') }}">Tambah Tiket</a>
        @endif
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-sm text-start" id="tableTiket">
                <thead class="table-dark">
                    <tr class="text-start">
                        <th>Select</th>
                        <th>ID Tiket</th>
                        <th>Nama Proyek</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Alasan Permintaan</th>
                        <th>Dampak</th>
                        <th>Kategori</th>
                        <th>Prioritas</th>
                        <th>Severity</th>
                        <th>Status Tiket</th>
                        <th>PIC RS</th>
                        <th>Assign To</th>
                        <th>PL Aviat</th>
                        <th>Mandays</th>
                        <th>Status Mandays</th>
                        <th>Tanggal Kirim</th>
                        <th>Status Persetujuan</th>
                        <th>Tanggal Persetujuan</th>
                        <th>Tag</th>
                        <th>Due Date</th>
                        <th>Tanggal Dikerjakan</th>
                        <th>Tanggal Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tikets as $tiket)
                        <tr class="text-start">
                            <td><input type="checkbox"></td>
                            <td><a href="{{ route('tiket.show', $tiket->idTiket) }}">{{ $tiket->idTiket }}</a></td>
                            <td>{{ $tiket->proyeks->namaProyek ?? 'N/A' }}</td>
                            <td>{{ $tiket->judul }}</td>
                            <td>{{ $tiket->deskripsi }}</td>
                            <td>{{ $tiket->alasanPermintaan }}</td>
                            <td>{{ $tiket->dampak }}</td>
                            <td>{{ $tiket->kategori }}</td>
                            <td>
                                @if ($tiket->prioritas === 'Urgent')
                                    <span class="badge bg-label-danger me-1">{{ $tiket->prioritas }}</span>
                                @elseif ($tiket->prioritas === 'High')
                                    <span class="badge bg-label-warning me-1">{{ $tiket->prioritas }}</span>
                                @elseif ($tiket->prioritas === 'Normal')
                                    <span class="badge bg-label-success me-1">{{ $tiket->prioritas }}</span>
                                @elseif ($tiket->prioritas === 'Low')
                                    <span class="badge bg-label-info me-1">{{ $tiket->prioritas }}</span>
                                @else
                                    <span class="badge bg-label-secondary me-1">{{ $tiket->prioritas }}</span>
                                @endif
                            </td>
                            <td>{{ $tiket->severity }}</td>
                            <td>{{ $tiket->status }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $tiket->mandays }}</td>
                            <td>
                                @if (Auth::user()->statusUser == 0 && $tiket->statusMandays === null)
                                    <form method="POST" action="{{ route('tiket-user.update', $tiket->idTiket) }}">
                                        @csrf
                                        @method('PUT')
                                        <select name="statusMandays" class="form-select-sm" id="statusMandays">
                                            <option value="" @if ($tiket->statusMandays === null) selected @endif>Pilih
                                                Status</option>
                                            <option value="0" @if ($tiket->statusMandays === 0) selected @endif>Tidak
                                                Setuju</option>
                                            <option value="1" @if ($tiket->statusMandays === 1) selected @endif>Setuju
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-xs"
                                            onclick="return confirm('Apakah anda sudah yakin?')">Simpan</button>
                                    </form>
                                @else
                                    @if ($tiket->statusMandays === 1)
                                        <span>Setuju</span>
                                    @elseif ($tiket->statusMandays === 0)
                                        <span>Tidak Setuju</span>
                                    @else
                                        <span>Belum diisi</span>
                                    @endif
                                @endif
                            </td>
                            <td>{{ $tiket->created_at->format('d M Y') }}</td>
                            <td>
                                @if ($tiket->persetujuan === 1)
                                    <span>Disetujui</span>
                                @elseif ($tiket->persetujuan === 0)
                                    <span>Tidak disetujui</span>
                                @else
                                    <span></span>
                                @endif
                            </td>
                            <td>{{ $tiket->tglPersetujuan }}</td>
                            <td>{{ $tiket->tag }}</td>
                            <td>{{ $tiket->dueDate }}</td>
                            <td>{{ $tiket->tglDikerjakan }}</td>
                            <td>{{ $tiket->tglSelesai }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('tiket.show', $tiket->idTiket) }}"><i
                                                class="bx bx-edit-alt me-2"></i>Edit</a>
                                        <form action="{{ route('tiket.destroy', $tiket->idTiket) }}" method="POST">
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
