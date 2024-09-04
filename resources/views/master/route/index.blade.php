@extends('layouts.app')
@section('title', 'Route')
@section('content')
<div class="container d-flex justify-content-between align-items-center">
    @include('master.route.create')
    <h4 class="py-3 mb-0">Detail Route</h4>
    <a class="btn btn-primary" type="button" data-bs-toggle="modal"
        data-bs-target="#addRoute" href="">Tambah Route</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table small-font-size">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Menu</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($routeGroups as $routeGroup)
                    <tr>
                        <td>{{ $routeGroup->name }}</td>
                        <td>{{ $routeGroup->permission_name }}</td>
                        <td>{{ $routeGroup->icon }}</td>
                        <td>
                            @if ($routeGroup->status == 1)
                                <span class="badge bg-label-success me-1">Show</span>
                            @else
                                <span class="badge bg-label-success me-1">Hide</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button"
                                    class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('route.item.index', $routeGroup->id) }}"><i
                                            class="bx bx-cog me-2"></i>Manage Items</a>
                                    <a class="dropdown-item" href="#"
                                        data-bs-target="#modal-form-edit-route-{{ $routeGroup->id }}"
                                        data-bs-toggle="modal"><i
                                            class="bx bx-edit-alt me-2"></i>Edit</a>
                                    <form
                                        action="{{ route('route.destroy', $routeGroup->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                            <i class="bx bx-trash me-2"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                                @include('master.route.edit')
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