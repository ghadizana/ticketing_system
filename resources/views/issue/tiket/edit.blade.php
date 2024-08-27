@extends('layouts.app')
@section('title', 'Detail Tiket')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.sidebar')
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Detail Tiket {{ $tikets->idTiket }}</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('tiket.update', $tikets->idTiket) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-judul">Judul</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="judul" class="form-control"
                                                    id="basic-default-judul" placeholder="Masukkan judul"
                                                    value="{{ old('judul', $tikets->judul) }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-deskripsi">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea id="basic-default-deskripsi" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi">{{ $tikets->deskripsi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-kategori">Kategori</label>
                                            <div class="col-sm-4">
                                                <select id="basic-default-kategori" class="form-select" name="kategori">
                                                    @foreach(['Pilih Kategori', 'Bugs', 'General', 'Question', 'Request Change'] as $kategori)
                                                        <option value="{{ $kategori }}" {{ old('kategori', $tikets->kategori) == $kategori ? 'selected' : '' }}>
                                                            {{ $kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-prioritas">Prioritas</label>
                                            <div class="col-sm-4">
                                                <select name="prioritas" id="basic-default-prioritas" class="form-select">
                                                    @foreach (['Pilih Prioritas', 'Low', 'Normal', 'High', 'Urgent', 'Immediete'] as $item)
                                                        <option value="{{ $item }}" {{ old('prioritas', $tikets->prioritas) == $item ? 'selected' : '' }}>
                                                            {{ $item }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-severity">Severity</label>
                                            <div class="col-sm-4">
                                                <select name="severity" id="basic-default-severity" class="form-select">
                                                    @foreach (['Pilih Severity', 'Minor', 'Major'] as $item)
                                                        <option value="{{ $item }}" {{ old('severity', $tikets->severity) == $item ? 'selected' : '' }}>
                                                            {{ $item }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-status ">Status</label>
                                            <div class="col-sm-4">
                                                <select name="status" id="basic-default-status" class="form-select">
                                                    @foreach (['Pilih Status', 'On Progress', 'Discuss', 'Done', 'Closed'] as $item)
                                                        <option value="{{ $item }}" {{ old('prioritas', $tikets->prioritas) == $item ? 'selected' : '' }}>
                                                            {{ $item }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-idProyek">Nama
                                                Proyek</label>
                                            <div class="col-sm-4">
                                                <select id="idProyek" class="form-select" name="idProyek">
                                                    <option value="" disabled>Pilih Nama Proyek</option>
                                                    @foreach ($proyeks as $proyek)
                                                        <option value="{{ $proyek->idProyek }}"
                                                            {{ $tikets->idProyek == $proyek->idProyek ? 'selected' : '' }}>
                                                            {{ $proyek->namaProyek }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label" for="basic-default-deskripsi">PIC
                                                RS</label>
                                            <div class="col-sm-4">
                                                <select id="picRs" class="form-select" name="picRs">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->userId }}"
                                                            {{ $tikets->picRs == $user->userId ? 'selected' : '' }}>
                                                            {{ $user->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-tglKirim">Tanggal
                                                Kirim</label>
                                            <div class="col-sm-4">
                                                <input type="text" disabled name="created_at" class="form-control" id="basic-default-tglKirim" value="{{ old('created_at', $tikets->created_at)->isoFormat('DD MMM YYYY') }}" />
                                            </div>
                                            <label class="col-sm-2 col-form-label" for="basic-default-dueDate">Due
                                                Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="dueDate" class="form-control"
                                                    id="basic-default-dueDate"
                                                    value="{{ old('dueDate', $tikets->dueDate ? \Carbon\Carbon::parse($tikets->dueDate)->format('Y-m-d') : '') }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-tglDikerjakan">Tanggal
                                                Dikerjakan</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="tglDikerjakan" class="form-control"
                                                    id="basic-default-tglDikerjakan"
                                                    value="{{ old('tglDikerjakan', $tikets->tglDikerjakan ? \Carbon\Carbon::parse($tikets->tglDikerjakan)->format('Y-m-d') : '') }}" />
                                            </div>
                                            <label class="col-sm-2 col-form-label" for="basic-default-tglSelesai">Tanggal
                                                Selesai</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="tglSelesai" class="form-control"
                                                    id="basic-default-tglSelesai"
                                                    value="{{ old('tglSelesai', $tikets->tglSelesai ? \Carbon\Carbon::parse($tikets->tglSelesai)->format('Y-m-d') : '') }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-alasan">Alasan
                                                Permintaan</label>
                                            <div class="col-sm-10">
                                                <textarea id="basic-default-alasan" name="alasanPermintaan" class="form-control"
                                                    placeholder="Masukkan alasan permintaan">{{ $tikets->alasanPermintaan }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-dampak">Dampak</label>
                                            <div class="col-sm-10">
                                                <textarea id="basic-default-dampak" name="dampak" class="form-control" placeholder="Masukkan dampak">{{ $tikets->dampak }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-assignTo">Assign
                                                To</label>
                                            <div class="col-sm-4">
                                                <select id="picRs" class="form-select" name="assignTo">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->userId }}"
                                                            {{ $tikets->assignTo == $user->userId ? 'selected' : '' }}>
                                                            {{ $user->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label" for="basic-default-plAviat">PL
                                                Aviat</label>
                                            <div class="col-sm-4">
                                                <select id="plAviat" class="form-select" name="plAviat">
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->userId }}"
                                                            {{ $tikets->plAviat == $user->userId ? 'selected' : '' }}>
                                                            {{ $user->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-persetujuan ">Persetujuan</label>
                                            <div class="col-sm-4">
                                                <select name="persetujuan" class="form-select" id="persetujuan">
                                                    <option value="1">Disetujui</option>
                                                    <option value="0">Tidak Disetujui</option>
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-tglPersetujuan">Tanggal Disetujui</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="tglPersetujuan" class="form-control"
                                                    id="basic-default-tglPersetujuan"
                                                    value="{{ old('tglPersetujuan', $tikets->tglPersetujuan ? \Carbon\Carbon::parse($tikets->tglPersetujuan)->format('Y-m-d') : '') }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-persetujuan ">Tag</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="tag" class="form-control"
                                                    id="basic-default-tag" placeholder="Masukkan tag"
                                                    value="{{ old('tag', $tikets->tag) }}" />
                                            </div>
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-tglPersetujuan">Mandays</label>
                                            <div class="col-sm-4">
                                                <input type="number" name="mandays" class="form-control"
                                                    placeholder="Masukkan mandays" value="{{ old('mandays', $tikets->mandays) }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="lampiran">Lampiran</label>
                                            <div class="col-sm-10">
                                                @forelse ($tikets->lampirans as $image)
                                                    @php
                                                        $filename = basename($image->path);
                                                        $extension = pathinfo($filename, PATHINFO_EXTENSION);
                                                    @endphp
                                                    @if (in_array($extension, ['jpg', 'jpeg', 'png',]))
                                                        <img style="width: 30%; height: auto;"
                                                            src="{{ asset('storage/lampirans/' . $image->path) }}"><br>
                                                    @else
                                                        <a
                                                            href="{{ asset('storage/lampirans/' . $image->path) }}">{{ $filename }}</a><br>
                                                    @endif
                                                @empty
                                                    <input type="file" name="lampiran" id="lampiran"
                                                        class="filepond" />
                                                @endforelse

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <a type="button" href="javascript:history.back()"
                                                    class="btn btn-danger">Batal</a>
                                                <button type="submit" class="btn btn-success">Edit Tiket</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('issue.komentar.index')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach((inputElement) => {
            const pond = FilePond.create(inputElement);
            FilePond.setOptions({
                server: {
                    process: '{{ route('image.store') }}',
                    revert: '{{ route('image.destroy') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                }
            });
        });
    </script>
@endpush
