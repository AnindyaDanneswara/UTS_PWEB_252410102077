@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">
    <div class="hero-card p-4 p-md-5 mb-4">
        <p class="mb-1 text-white-50">Selamat datang kembali</p>
        <h1 class="fw-bold">Halo, {{ $username }}! 👋</h1>
        <p class="mb-0">Saat ini kamu berada di <strong>Minggu {{ $aktif['minggu'] }} · {{ $aktif['fase'] }}</strong>.</p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card stat-card shadow-sm h-100"><div class="card-body">
                <p class="text-muted mb-1">Total Fase</p>
                <h2 class="fw-bold mb-0">{{ count($minggu) }}</h2>
            </div></div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card stat-card shadow-sm h-100"><div class="card-body">
                <p class="text-muted mb-1">Total Tugas</p>
                <h2 class="fw-bold mb-0">{{ $totalTugas }}</h2>
            </div></div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card stat-card shadow-sm h-100"><div class="card-body">
                <p class="text-muted mb-1">Minggu Aktif</p>
                <h2 class="fw-bold mb-0">{{ $aktif['minggu'] }}</h2>
            </div></div>
        </div>
    </div>

    <div class="card stat-card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="h5 fw-bold">Progress Project</h2>
            <div class="progress" style="height: 1.5rem;">
                <div class="progress-bar" style="width: {{ $progress }}%">{{ $progress }}%</div>
            </div>
        </div>
    </div>

    <div class="card stat-card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="h5 fw-bold">Tugas Minggu {{ $aktif['minggu'] }}</h2>
            <ul class="mb-0">
                @foreach ($aktif['tugas'] as $tugas)
                    <li>{{ $tugas }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn btn-primary">
        Lihat Roadmap Lengkap <i class="bi bi-arrow-right ms-1"></i>
    </a>
</div>
@endsection