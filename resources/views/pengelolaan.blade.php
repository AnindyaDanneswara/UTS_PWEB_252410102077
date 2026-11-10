@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
<div class="container py-4">
    <h1 class="h2 fw-bold">Roadmap Project UI/UX</h1>
    <p class="text-muted mb-4">Minggu 13 sampai 16, dari sketsa hingga presentasi akhir.</p>

    <div class="timeline">
        @foreach ($minggu as $item)
            <div class="timeline-item {{ $item['status'] === 'Sedang Berjalan' ? 'aktif' : '' }}">
                <div class="timeline-icon"><i class="bi {{ $item['ikon'] }}"></i></div>
                <div class="card timeline-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                            <h2 class="h5 fw-bold mb-0">Minggu {{ $item['minggu'] }} · {{ $item['fase'] }}</h2>
                            <span class="badge {{ $item['status'] === 'Sedang Berjalan' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $item['status'] }}
                            </span>
                        </div>
                        <p class="text-muted">{{ $item['deskripsi'] }}</p>
                        <ul class="list-unstyled mb-0">
                            @foreach ($item['tugas'] as $tugas)
                                <li class="mb-1"><i class="bi bi-check2-circle text-primary me-2"></i>{{ $tugas }}</li>
                            @endforeach
                        </ul>

                        @if ($item['minggu'] === 16)
                            @include('partials.ucapan')
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection