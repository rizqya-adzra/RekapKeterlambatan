@extends('template.link')


@section('link')
    
@push('script')
    <script href="main.js"></script>
@endpush
<header>
    <div class="nav1" id="navbar">
        <nav class="nav1__container">
            <div>
                <a href="#" class="nav1__link nav1__logo">
                    <i class='bx bxs-disc nav1__icon'></i>
                    <span class="nav1__logo-name">Rekap Keterlambatan!</span>
                </a>

                <div class="nav1__list">
                    <div class="nav1__items">
                        <h3 class="nav1__subtitle">Profile</h3>

                        <a href="{{ route('dashboard') }}"
                            class="nav1__link {{ Route::is('dashboard') ? 'active' : '' }}">
                            <i class='bx bx-home nav1__icon'></i>
                            <span class="nav1__name">Dashboard</span>
                        </a>

                        <div class="nav1__dropdown">
                            <a href="#" class="nav1__link">
                                <i class='bx bx-user nav1__icon'></i>
                                <span class="nav1__name">Data Master</span>
                                <i class='bx bx-chevron-down nav1__icon nav1__dropdown-icon'></i>
                            </a>

                            <div class="nav1__dropdown-collapse">
                                <div class="nav1__dropdown-content">
                                    <a href=" {{ route('rombel.index') }} "
                                        class="nav1__dropdown-item {{ Route::is('rombel.index') ? 'active' : '' }}">Data
                                        Rombel</a>
                                    <a href=" {{ route('rayon.index') }} "
                                        class="nav1__dropdown-item {{ Route::is('rayon.index') ? 'active' : '' }}">Data
                                        Rayon</a>
                                    <a href=" {{ route('student.index') }} "
                                        class="nav1__dropdown-item {{ Route::is('student.index') ? 'active' : '' }}">Data
                                        Siswa</a>
                                    <a href=" {{ route('user.index') }} "
                                        class="nav1__dropdown-item {{ Route::is('user.index') ? 'active' : '' }}">Data
                                        User</a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('late.index') }}" class="nav1__link">
                            <i class='bx bx-message-rounded nav1__icon'></i>
                            <span class="nav1__name">Keterlambatan</span>
                        </a>
                    </div>


                </div>

                <a href="{{ route('logout') }}" class="nav1__link nav1__logout">
                    <i class='bx bx-log-out nav1__icon'></i>
                    <span class="nav1__name">Log Out</span>
                </a>
        </nav>
    </div>
</header>
<div class="container content">
    @yield('konten-dinamis')
</div>

@endsection
