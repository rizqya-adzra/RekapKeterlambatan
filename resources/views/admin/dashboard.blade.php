@extends('template.app', ['title' => 'Dashboard'])

@section('konten-dinamis')
    <div class="d-flex justify-content-around align-items-center mb-4">
        <div>
            <h1 class="text-prior">Dashboard Admin</h1>
            <small><a href="">> dasboard</a></small>
        </div>
        <div class="d-flex align-items-end " style="gap: 15px">
            <div>
                <h5>Admin 1</h5>
            </div>
            <div class="icon-container" style="border: 2px solid #133">
                <i class="fa fa-user" style="color: #133E87;"></i>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4" style="width: 75%;">
        <section id="minimal-statistics">
            <div class="row">
                <!-- Card Siswa -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5" style="min-height:140px">
                        <div class="icon-container">
                            <i class="fa fa-graduation-cap" style="color: #133E87; font-size: 2.7rem;"></i>
                        </div>
                        <div class="text-container text-end">
                            <h3 class="mb-0">{{ $student }}</h3>
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
                            <h3 class="mb-0">{{ $rombel }}</h3>
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
                            <h3 class="mb-0">{{ $admin }}</h3>
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
                            <h3 class="mb-0">{{ $rayon }}</h3>
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
                            <h3 class="mb-0">{{ $ps }}</h3>
                            <span>Pembimbing Siswa</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    
@endsection
