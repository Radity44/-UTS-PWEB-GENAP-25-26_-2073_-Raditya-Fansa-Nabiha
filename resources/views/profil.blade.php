@extends('layouts.app')

@section('title', 'Profil | MyRencana')

@section('content')
<div class="section-header">
    <h1 class="fw-bold text-primary mb-3">Profil Pengguna</h1>
</div>

<div class="section-content">
    <div class="card shadow-sm border-0 p-4" style="max-width: 500px; margin:auto;">
        <div class="card-body text-center">
            <h4 class="fw-bold text-info mb-1">
                <i class="bi bi-person-circle"></i> {{ $nama_lengkap ?? 'Pengguna' }}
            </h4>

            <p class="text-muted mb-4">{{ '@' . ($username ?? 'username') }}</p>

            <hr>

            {{-- Statistik tugas --}}
            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Tugas PribadiGwej</span>
                    <span class="badge bg-info text-white">{{ $totalPribadi }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Tugas TeamGwej</span>
                    <span class="badge bg-primary text-white">{{ $totalTeam }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Tugas Selesai</span>
                    <span class="badge bg-success text-white">{{ $totalSelesai }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
