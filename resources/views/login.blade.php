@extends('layouts.app')

@section('title', 'Masuk')
@section('tanpa-nav', '1')

@section('content')
<div class="login-wrapper">
    <div class="card login-card shadow-lg border-0">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <i class="bi bi-diagram-3-fill logo-icon"></i>
                <h1 class="h3 fw-bold mt-2">UX Sprint Planner</h1>
                <p class="text-muted mb-0">Pantau roadmap project UI/UX minggu 13 - 16</p>
            </div>

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username"
                           class="form-control @error('username') is-invalid @enderror"
                           value="{{ old('username') }}" placeholder="contoh: nanda">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••">
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
        </div>
    </div>
</div>
@endsection