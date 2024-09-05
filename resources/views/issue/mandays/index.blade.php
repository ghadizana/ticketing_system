@extends('layouts.app')
@section('title', 'Mandays')
@section('content')
    <div class="container d-flex justify-content-between align-items-center">
        @include('issue.mandays.create')
        <h4 class="py-3 mb-0">Detail Mandays</h4>
        <a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addMandays" href="#">Tambah
            Mandays</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Proyek</th>
                        <th>Tahun</th>
                        <th>Mandays</th>
                        <th>Terpakai</th>
                        <th>Sisa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mandays as $item)
                        <tr>
                            <td>{{ $item->proyek ? $item->proyek->namaProyek : 'N/A' }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td><span class="badge bg-label-success me-1">{{ $item->mandays }}</span>
                            </td>
                            <td><span class="badge bg-label-info me-1">{{ $item->terpakai }}</span>
                            </td>
                            <td><span class="badge bg-label-warning me-1">{{ $item->mandays - $item->terpakai }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"
                                            data-bs-target="#modal-form-edit-mandays-{{ $item->idMandays }}"
                                            data-bs-toggle="modal"><i class="bx bx-edit-alt me-2"></i>Edit</a>
                                        <form action="{{ route('mandays.destroy', $item->idMandays) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                <i class="bx bx-trash me-2"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                    @include('issue.mandays.edit')
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="6" class="text-center">Tidak ada data untuk
                                ditampilkan</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
