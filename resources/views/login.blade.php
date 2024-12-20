@extends('template.link')

@section('link')
<div class="container-fluid d-flex align-items-center justify-content-center mt-5">
    <div class="row w-100 shadow-lg rounded-3 overflow-hidden" style="max-width: 1000px;">
        <div class="col-lg-5 col-md-12 bg-white p-5 d-flex flex-column justify-content-center">
            <form class="form p-4" action="{{ route('login.auth') }}"  method="POST">
                @csrf
                <div class="mb-4 text-center">
                    <h1 class="fw-bold" style="color: #133E87; font-size: 1.8rem;">LOGIN</h1>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold" style="color: #133E87;">Email</label>
                    <input type="text" name="email" class="form-control form-control" id="email" placeholder="Masukan email">
                </div>
                <div class="mb-5">
                    <label for="password" class="form-label fw-semibold" style="color: #133E87;">Password</label>
                    <input type="password" name="password" class="form-control form-control" id="password" placeholder="Masukan password">
                </div>
                <div class="text-center">
                    <button type="submit" name="isCreatingAccount" value="false" class="btn btn w-100" style="background-color: #133E87; color: white; font-weight: bold;">Login</button>
                </div>                
            </form>
        </div>
        
        <div class="col-lg-7 d-none d-lg-flex p-5 position-relative" style="background-color: #133E87 ; overflow: hidden;">
            <div style="
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url('{{ asset('image/login_img.jpeg') }}') center/cover no-repeat;\z-index: 1;
                opacity: 0.1;">
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center text-center" style="z-index: 2; position: relative;">
                <h2 class="fw-bold mb-3" style=" font-size: 2rem; color: white;">WELCOME!</h2>
                <p class="lh-lg" style=" max-width: 500px; font-size: 0.9rem; color: white;">
                    Aplikasi yang Mencatat dan menganalisis keterlambatan siswa. Yang bertujuan untuk memantau kedisiplinan siswa, menemukan alasan/pola keterlambatan, dan membantu pencatatan keterlambatan.
                </p>
            </div>
        </div>
    </div>
</div>    




@endsection