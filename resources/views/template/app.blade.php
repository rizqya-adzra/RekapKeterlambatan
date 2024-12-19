<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    @stack('style') --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fontawesome.com/icons/trash?f=classic&s=solids">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <svg xmlns="http://www.w3.org/2000/svg" width="5" height="5" class="d-none" class="d-none">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path fill="green"
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
    </svg>
    {{-- <link rel="icon" href="image/burgericon.png"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('scss/responsive.scss')}}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://fontawesome.com/icons/magnifying-glass?f=classic&s=solid">
    @stack('style')
    <title> {{ $title }} </title>
</head>

<body>
    @push('script')
    <script href="main.js"></script>
    @endpush
    <header>
        <div class="nav1" id="navbar">
            <nav class="nav1__container">
                <div>
                    <a href="#" class="nav1__link nav1__logo">
                        <i class='bx bxs-disc nav1__icon' ></i>
                        <span class="nav1__logo-name">Rekap Keterlambatan!</span>
                    </a>
    
                    <div class="nav1__list">
                        <div class="nav1__items">
                            <h3 class="nav1__subtitle">Profile</h3>
    
                            <a href="{{ route('dashboard') }}" class="nav1__link {{ Route::is('dashboard') ? 'active' : '' }}">
                                <i class='bx bx-home nav1__icon' ></i>
                                <span class="nav1__name">Dashboard</span>
                            </a>
                            
                            <div class="nav1__dropdown">
                                <a href="#" class="nav1__link">
                                    <i class='bx bx-user nav1__icon' ></i>
                                    <span class="nav1__name">Data Master</span>
                                    <i class='bx bx-chevron-down nav1__icon nav1__dropdown-icon'></i>
                                </a>

                                <div class="nav1__dropdown-collapse">
                                    <div class="nav1__dropdown-content">
                                        <a href=" {{ route('rombel.index') }} " class="nav1__dropdown-item {{ Route::is('rombel.index') ? 'active' : '' }}">Data Rombel</a>
                                        <a href=" {{ route('rayon.index') }} " class="nav1__dropdown-item {{ Route::is('rayon.index') ? 'active' : '' }}">Data Rayon</a>
                                        <a href=" {{ route('student.index') }} " class="nav1__dropdown-item {{ Route::is('student.index') ? 'active' : '' }}">Data Siswa</a>
                                        <a href=" {{ route('user.index') }} " class="nav1__dropdown-item {{ Route::is('user.index') ? 'active' : '' }}">Data User</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('late.index') }}" class="nav1__link">
                                <i class='bx bx-message-rounded nav1__icon' ></i>
                                <span class="nav1__name">Keterlambatan</span>
                            </a>
                        </div>
    
                        
                </div>

                <a href="#" class="nav1__link nav1__logout">
                    <i class='bx bx-log-out nav1__icon' ></i>
                    <span class="nav1__name">Log Out</span>
                </a>
            </nav>
        </div>
    </header>
    <div class="container content">
        @yield('konten-dinamis')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @endpush
    @stack('script')
</body>

</html>
