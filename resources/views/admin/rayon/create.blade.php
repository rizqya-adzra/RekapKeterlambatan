@extends('template.app', ['title' => 'Tambah Rayon'])

@section('konten-dinamis')
    <section class="container mt-2" style="width: 80%">
        <div class="d-flex justify-content-around align-items-center mb-4">
            <div>
                <h1 class="text-prior">Tambah Data Rayon</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active"><a href="{{ route('rayon.index') }}">Rayon</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                  </nav>
            </div>
            <a class="btn btn-outline-secondary p-2" href="{{ route('rayon.index') }}"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Back</a>
        </div>
        <form class="card p-5" action="{{ route('rayon.store') }}" method="POST">
            @if (Session::get('failed'))
                <div class="alert alert-danger"> {{ Session::get('failed') }} </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success"> {{ Session::get('success') }} </div>
            @endif
            @csrf
            <div class="form-group">
                <label class="form-label" for="">Rayon</label>
                <input class="form-control" type="text" name="rayon">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Pembimbing Siswa</label>
                <select class="form-select" name="user_id" id="user">
                    <option selected disabled hidden value=""></option>
                    @foreach ($user as $item)
                        <option value=" {{ $item->id }} "> {{ $item['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <button class="btn-prior mt-3" type="submit">Kirim</button>
        </form>
    </section>
@endsection
