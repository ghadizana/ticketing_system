@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-xxl-8 mb-6 order-0">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-sm-7 d-flex align-items-center">
                    <div class="card-body text-start">
                        <h5 class="card-title text-primary mb-3">Selamat Datang, {{ Auth::user()->nama }}! 🎉</h5>
                        <p class="mb-6">Kamu sudah menyelesaikan 4 tugas di bulan ini.</p>
                        <button class="btn btn-xs btn-primary">Lihat Pencapaian</button>
                    </div>
                </div>
                <div class="col-sm-5 d-flex align-items-center justify-content-center">
                    <img src="../../assets/img/illustrations/man-with-laptop-light.png" height="175" alt="View Badge User">
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-4 col-lg-12">
        <div class="row">
            <!-- All Task Card -->
            <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start mb-2">
                            <h6>All Task</h6>
                        </div>
                        <table class="table justify-content-between text-start">
                            <tbody>
                                @forelse ($tikets as $tiket)
                                <tr>
                                    <td><a href="{{ route('tiket.show', $tiket->idTiket) }}">{{ $tiket->idTiket }}</a></td>
                                    <td class="text-success">{{ $tiket->status }}</td>
                                </tr>
                                @empty
                                <p>Tidak ada data untuk ditampilkan</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Uncompleted Task Card -->
            <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <h6>Uncompleted</h6>
                        </div>
                        <table class="table justify-content-between text-start">
                            <tbody>
                                @forelse ($status as $item)
                                <tr>
                                    <td><a href="{{ route('tiket.show', $item->idTiket) }}">{{ $item->idTiket }}</a></td>
                                    <td class="text-success">{{ $item->status }}</td>
                                </tr>
                                @empty
                                <p>Tidak ada data untuk ditampilkan</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Completed Task Card -->
            <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-4">
                            <h6>Complete</h6>
                        </div>
                        <table class="table justify-content-between text-start">
                            <tbody>
                                @forelse ($finished as $item)
                                <tr>
                                    <td><a href="{{ route('tiket.show', $item->idTiket) }}">{{ $item->idTiket }}</a></td>
                                    <td class="text-success">{{ $item->status }}</td>
                                </tr>
                                @empty
                                <p>Tidak ada data untuk ditampilkan</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
