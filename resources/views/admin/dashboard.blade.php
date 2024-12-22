@extends('template.app', ['title' => 'Dashboard'])

@section('konten-dinamis')
    @if (Session::get('success'))
        <div class="toast position-fixed bottom-0 end-0 m-3 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true"
            id="toast" data-bs-delay="4000" data-bs-autohide="true">
            <div class="toast-header bg-success text-white">
                <i class="bi bi-check-circle me-2"></i>
                <strong class="me-auto">Success</strong>
                <small>Baru saja</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="d-flex justify-content-around align-items-center mb-4">
        <div>
            @if (Auth::user()->role === 'admin')
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
                @if (Auth::user()->role === 'admin')
                    {{-- Card Siswa --}}
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5"
                            style="min-height:140px">
                            <div class="icon-container">
                                <i class="fa fa-graduation-cap" style="color: #133E87; font-size: 2.7rem;"></i>
                            </div>
                            <div class="text-container text-end">
                                <h3 class="fs-2">{{ $student }}</h3>
                                <span>Siswa</span>
                            </div>
                        </div>
                    </div>

                    {{-- Card Rombel --}}
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5"
                            style="min-height:140px">
                            <div class="icon-container">
                                <i class="fa fa-book" style="color: #133E87; font-size: 2.7rem;"></i>
                            </div>
                            <div class="text-container text-end">
                                <h3 class="fs-2">{{ $rombel }}</h3>
                                <span>Rombel</span>
                            </div>
                        </div>
                    </div>

                    {{-- Card Admin --}}
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5"
                            style="min-height:140px">
                            <div class="icon-container">
                                <i class="fa fa-user" style="color: #133E87; font-size: 2.7rem;"></i>
                            </div>
                            <div class="text-container text-end">
                                <h3 class="fs-2">{{ $admin }}</h3>
                                <span>Admin</span>
                            </div>
                        </div>
                    </div>


                    {{-- Card Rayon --}}
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5"
                            style="min-height:140px">
                            <div class="icon-container">
                                <i class="fa fa-home" style="color: #133E87; font-size: 2.7rem;"></i>
                            </div>
                            <div class="text-container text-end">
                                <h3 class="fs-2">{{ $rayon }}</h3>
                                <span>Rayon</span>
                            </div>
                        </div>
                    </div>

                    {{-- Card Pembimbing Siswa  --}}
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5"
                            style="min-height:140px">
                            <div class="icon-container">
                                <i class="fa fa-id-card" style="color: #133E87; font-size: 2.7rem;"></i>
                            </div>
                            <div class="text-container text-end">
                                <h3 class="fs-2">{{ $ps }}</h3>
                                <span>Pembimbing Siswa</span>
                            </div>
                        </div>
                    </div>

                    {{-- Card Keterlambatan --}}
                    <div class="col-md-6 col-lg-12 mb-3">
                        <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5"
                            style="min-height:140px">
                            <div class="icon-container">
                                <i class="fa fa-minus-circle fa-5x" style="color: #133E87;" aria-hidden="true"></i>
                            </div>
                            <div class="text-container text-center">
                                <h3 class="mb-2 fs-2 {{ ($lateToday > 0 || $lateThisWeek > 0 || $lateThisMonth > 0 || $lateThisYear > 0) ? 'text-danger' : '' }}" 
                                    id="lateCount">
                                    {{ $lateToday }}
                                </h3>                                
                                <span id="lateLabel">Keterlambatan Hari Ini</span>
                            </div>
                            <div class="icon-container">
                                <i class="btn fa fa-arrows-h fa-2x" style="color: #133E87;" aria-hidden="true"
                                    onclick="changeLateCount()"></i>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-lg-5 mb-3">
                        <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5"
                            style="min-height:140px">
                            <div class="icon-container">
                                <i class="fa fa-graduation-cap" style="color: #133E87; font-size: 2.7rem;"></i>
                            </div>
                            <div class="text-container text-end">
                                <h3 class="mb-5 fs-2">{{ $students }}</h3>
                                <span>Siswa Rayon {{ $pembimbing->rayon }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-3">
                        <div class="card shadow d-flex flex-row justify-content-between align-items-center p-5"
                            style="min-height:140px">
                            <div class="icon-container">
                                <i class="fa fa-minus-circle" style="color: #133E87; font-size: 2.7rem;"></i>
                            </div>
                            <div class="text-container text-end">
                                <h3 class="mb-4 fs-2 {{ $lateCount > 0 ? 'text-danger' : '' }}">
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

@if (Auth::user()->role === 'admin')
    @push('script')
        <script>
            $(document).ready(function() {
                if ($(".toast").length) {
                    var toast = new bootstrap.Toast(document.getElementById('toast'));
                    toast.show();
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                let lateType = 'today';

                function changeLateCount() {
                    const lateCountElement = document.getElementById('lateCount');
                    const lateLabelElement = document.getElementById('lateLabel');

                    if (!lateCountElement || !lateLabelElement) {
                        console.error("Element with id 'lateCount' or 'lateLabel' not found!");
                        return;
                    }

                    if (lateType === 'today') {
                        lateCountElement.textContent = '{{ $lateThisWeek }}';
                        lateLabelElement.textContent = 'Keterlambatan Minggu Ini';
                        lateType = 'week';
                    } else if (lateType === 'week') {
                        lateCountElement.textContent = '{{ $lateThisMonth }}';
                        lateLabelElement.textContent = 'Keterlambatan Bulan Ini';
                        lateType = 'month';
                    } else if (lateType === 'month') {
                        lateCountElement.textContent = '{{ $lateThisYear }}';
                        lateLabelElement.textContent = 'Keterlambatan Tahun Ini';
                        lateType = 'year';
                    } else {
                        lateCountElement.textContent = '{{ $lateToday }}';
                        lateLabelElement.textContent = 'Keterlambatan Hari Ini';
                        lateType = 'today';
                    }
                }

                const arrowsButton = document.querySelector('.fa-arrows-h');
                if (arrowsButton) {
                    arrowsButton.addEventListener('click', changeLateCount);
                }
            });
        </script>
    @endpush
@endif
