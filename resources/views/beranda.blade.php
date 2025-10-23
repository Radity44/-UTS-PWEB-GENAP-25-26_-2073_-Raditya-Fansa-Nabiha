@extends('layouts.app')

@section('title', 'Beranda | MyRencana')

@section('content')
<div class="section-header">
    <h1 class="fw-bold text-primary mb-2">Beranda</h1>
</div>

<div class="section-content">
    <h4 class="text-dark">Selamat datang, {{ $nama_lengkap ?? 'Pengguna' }}!

    </h4>

    <p class="mt-3">MyRaja Ini Adalah Quest Yang Harus Di Selesaikan 👇</p>

    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 p-3">
                <h5 class="fw-bold text-success mb-3">✔️ Selesai</h5>

                @if ($selesai->isEmpty())
                    <p class="text-muted">Belum ada tugas yang diselesaikan.</p>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($selesai as $item)
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0">
                                <span class="text-decoration-line-through text-muted">{{ $item['judul'] }}</span>
                                <span class="badge bg-success">{{ $item['kategori'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 p-3">
                <h5 class="fw-bold text-info mb-3">📋 PribadiGwej</h5>

                @if ($pribadi->isEmpty())
                    <p class="text-muted">Belum ada rencana pribadi.</p>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($pribadi as $item)
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0">
                                <span>{{ $item['judul'] }}</span>
                                <span class="badge bg-info text-white">{{ $item['kategori'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 p-3">
                <h5 class="fw-bold text-primary mb-3">👥 TeamGwej</h5>

                @if ($team->isEmpty())
                    <p class="text-muted">Belum ada rencana tim.</p>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($team as $item)
                            <li class="list-group-item border-0 d-flex justify-content-between align-items-center ps-0">
                                <span>{{ $item['judul'] }}</span>
                                <span class="badge bg-primary">{{ $item['kategori'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
