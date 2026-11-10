@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container py-4">
    <div class="card stat-card shadow-sm mx-auto" style="max-width: 640px;">
        <div class="card-body p-4 text-center">
            <img src="{{ asset('images/profilku.jpeg') }}" alt="Foto {{ $username }}" class="profile-foto mb-3">
            <h1 class="h3 fw-bold mb-0">{{ $username }}</h1>
            <p class="text-muted">Pengguna aktif UX Sprint Planner</p>

            <div class="text-start mt-4">
                @foreach ($profil as $label => $nilai)
                    <div class="row border-top py-2">
                        <div class="col-5 text-muted">{{ $label }}</div>
                        <div class="col-7 fw-semibold">{{ $nilai }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection