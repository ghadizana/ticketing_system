@extends('layouts.app')
@section('title', 'Tambah Tiket')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.sidebar')

            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Tambah Tiket</h5>
                                </div>
                                <form action="{{ route('tiket.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="idProyek" value="{{ Auth::user()->idProyek }}" />
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="judul" class="form-control" id="judul"
                                                    placeholder="Masukkan judul" required />
                                            </div>
                                            @error('judul')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <input type="text" name="idProyek" hidden value="{{ Auth::user()->idProyek }}">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi" required></textarea>
                                            </div>
                                            @error('deskripsi')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
                                            <div class="col-sm-4">
                                                <select id="kategori" class="form-select" name="kategori">
                                                    <option value="" disabled selected>Pilih Kategori</option>
                                                    @foreach (['Bugs', 'General', 'Question', 'Request Change'] as $kategori)
                                                        <option value="{{ $kategori }}">{{ $kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('kategori')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                            <label class="col-sm-2 col-form-label" for="prioritas">Prioritas</label>
                                            <div class="col-sm-4">
                                                <select id="prioritas" class="form-select" name="prioritas">
                                                    <option value="" disabled selected>Pilih Prioritas</option>
                                                    @foreach (['Low', 'Normal', 'High', 'Urgent', 'Immediate'] as $prioritas)
                                                        <option value="{{ $prioritas }}">{{ $prioritas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('prioritas')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="severity">Severity</label>
                                            <div class="col-sm-4">
                                                <select id="severity" class="form-select" name="severity">
                                                    <option value="" disabled selected>Pilih Severity</option>
                                                    @foreach (['Minor', 'Mayor'] as $severity)
                                                        <option value="{{ $severity }}">{{ $severity }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('severity')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                            <label class="col-sm-2 col-form-label" for="status">Status</label>
                                            <div class="col-sm-4">
                                                <select id="status" class="form-select" name="status">
                                                    <option value="" disabled selected>Pilih Status</option>
                                                    @foreach (['Request', 'On Progress', 'Discuss', 'Done', 'Closed'] as $status)
                                                        <option value="{{ $status }}">{{ $status }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('status')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="picRs">PIC
                                                RS</label>
                                            <div class="col-sm-4">
                                                <select id="picRs" class="form-select" name="picRs" required>
                                                    <option value="" disabled selected>Pilih PIC RS</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->userId }}">{{ $user->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('picRs')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-persetujuan ">Tag</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="tag" class="form-control"
                                                    id="basic-default-tag" placeholder="Masukkan tag" />
                                            </div>
                                            @error('tag')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-alasan">Alasan
                                                Permintaan</label>
                                            <div class="col-sm-10">
                                                <textarea id="basic-default-alasan" name="alasanPermintaan" class="form-control" placeholder="Masukkan alasan"
                                                    aria-describedby="basic-icon-default-alasan2" required></textarea>
                                            </div>
                                            @error('alasanPermintaan')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label"
                                                for="basic-default-dampak">Dampak</label>
                                            <div class="col-sm-10">
                                                <textarea id="basic-default-dampak" name="dampak" class="form-control" placeholder="Masukkan dampak"
                                                    aria-describedby="basic-icon-default-dampak2" required></textarea>
                                            </div>
                                            @error('dampak')
                                                <div class="text text-danger text-start">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label for="lampiran" class="form-label">Lampiran</label>
                                            <input type="file" name="image" id="lampiran" class="filepond"
                                                multiple credits="false" />
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-danger me-2"
                                                onclick="window.history.back()">Batal</button>
                                            <button type="submit" class="btn btn-success">Tambah Tiket</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                process: '{{ route('image.store') }}',
                revert: '{{ route('image.destroy') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }
        })
    </script>
@endpush
