@extends('template.app', ['title' => 'Data Keterlambatan'])

@section('konten-dinamis')
<section class="container" style="width: 80%">
    <div class="d-flex justify-content-start align-items-center mb-4">
        <div>
            <h1 class="text-prior">Detail Data Keterlambatan</h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('late.index') }}">Late</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show</li>
                </ol>
              </nav>
        </div>
    </div>
    <div class="d-flex" style="gap: 30px">
        @foreach ($lates as $index => $late)
            <div class="p-5 shadow-sm" style="background-color: white">
                <h5>Keterlambatan Ke-{{ $index + 1 }}</h5>
                <td> {{ \Carbon\Carbon::parse($late->date_time_late)->locale('id')->translatedFormat('l, d F Y H:i') }} </td>
                <p class="text-danger mt-3">{{ $late->information }}</p>
                <img class="object-fit-fill border rounded" style="width: 200px" src="{{ asset('storage/' . $late['bukti']) }}" alt="Bukti">
            </div>
        @endforeach
    </div>
</section>

@endsection

