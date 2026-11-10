@props(['username' => 'Tamu'])

<nav class="navbar navbar-expand-md navbar-dark navbar-planner sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard', ['username' => $username]) }}">
            <i class="bi bi-diagram-3-fill me-2"></i>UX Sprint Planner
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuUtama">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav ms-auto align-items-md-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard', ['username' => $username]) }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}"
                       href="{{ route('pengelolaan', ['username' => $username]) }}">Pengelolaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}"
                       href="{{ route('profile', ['username' => $username]) }}">Profile</a>
                </li>
                <li class="nav-item ms-md-3">
                    <a class="btn btn-sm btn-light" href="{{ route('login') }}">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>