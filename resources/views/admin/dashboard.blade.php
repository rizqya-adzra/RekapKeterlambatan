@extends('template.app', ['title' => 'Dashboard'])

@section('konten-dinamis')
    <div class="d-flex justify-content-around align-items-center mb-4">
        <div>
            @if (Auth::user()->role === "admin")
            <h1 class="text-prior">Dashboard Admin</h1>
            @else
            <h1 class="text-prior">Dashboard Pembimbing</h1>
            @endif
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-end " style="gap: 15px">
            <div>
                <h5>{{ Auth::user()->name }}</h5>
                <small> {{ Auth::user()->email }} </small>
            </div>
            <div class="icon-container" style="border: 2px solid #133">
                <i class="fa fa-user" style="color: #133E87;"></i>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4" style="width: 75%;">
        <section id="minimal-statistics">
            <div class="row">
                @if (Auth::user()->role === "admin")
                <!-- Card Siswa -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5" style="min-height:140px">
                        <div class="icon-container">
                            <i class="fa fa-graduation-cap" style="color: #133E87; font-size: 2.7rem;"></i>
                        </div>
                        <div class="text-container text-end">
                            <h3 class="mb-3 fs-2">{{ $student }}</h3>
                            <span>Siswa</span>
                        </div>
                    </div>
                </div>
                
                <!-- Card Rombel -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5" style="min-height:140px">
                        <div class="icon-container">
                            <i class="fa fa-book" style="color: #133E87; font-size: 2.7rem;"></i>
                        </div>
                        <div class="text-container text-end">
                            <h3 class="mb-3 fs-2">{{ $rombel }}</h3>
                            <span>Rombel</span>
                        </div>
                    </div>
                </div>

                <!-- Card Admin -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5" style="min-height:140px">
                        <div class="icon-container">
                            <i class="fa fa-user" style="color: #133E87; font-size: 2.7rem;"></i>
                        </div>
                        <div class="text-container text-end">
                            <h3 class="mb-3 fs-2">{{ $admin }}</h3>
                            <span>Admin</span>
                        </div>
                    </div>
                </div>
    
                
                <!-- Card Rayon -->
                <div class="col-md-6 col-lg-6 mb-3">
                    <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5" style="min-height:140px">
                        <div class="icon-container">
                            <i class="fa fa-home" style="color: #133E87; font-size: 2.7rem;"></i>
                        </div>
                        <div class="text-container text-end">
                            <h3 class="mb-3 fs-2">{{ $rayon }}</h3>
                            <span>Rayon</span>
                        </div>
                    </div>
                </div>
                
                <!-- Card Pembimbing Siswa -->
                <div class="col-md-6 col-lg-6 mb-3">
                    <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5" style="min-height:140px">
                        <div class="icon-container">
                            <i class="fa fa-id-card" style="color: #133E87; font-size: 2.7rem;"></i>
                        </div>
                        <div class="text-container text-end">
                            <h3 class="mb-3 fs-2">{{ $ps }}</h3>
                            <span>Pembimbing Siswa</span>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-6 col-lg-5 mb-3">
                    <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5" style="min-height:140px">
                        <div class="icon-container">
                            <i class="fa fa-graduation-cap" style="color: #133E87; font-size: 2.7rem;"></i>
                        </div>
                        <div class="text-container text-end">
                            <h3 class="mb-3 fs-2">{{ $students }}</h3>
                        <span>Siswa Rayon {{ $pembimbing->rayon }} </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                    <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5" style="min-height:140px">
                        <div class="icon-container">
                            <i class="fa fa-home" style="color: #133E87; font-size: 2.7rem;"></i>
                        </div>
                        <div class="text-container text-end">
                            <h3 class="mb-3 fs-2 {{ $lateCount > 0 ? 'text-danger' : '' }}">
                                {{ $lateCount }}
                            </h3>                            
                            <span>Keterlambatan {{ $pembimbing->rayon }} </span>
                            <br>
                            <span>{{ \Carbon\Carbon::parse(today())->locale('id')->translatedFormat('l, d F Y ') }}<span>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </section>
    </div>
@endsection
