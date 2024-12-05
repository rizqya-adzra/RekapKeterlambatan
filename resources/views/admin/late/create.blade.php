@extends('template.app', ['title' => 'Tambah Keterlambatan'])

@section('konten-dinamis')
    <section class="container mt-2" style="width: 80%">
        <div class="d-flex justify-content-around align-items-center mb-4">
            <div>
                <h1 class="text-prior">Tambah Data Keterlambatan</h1>
                <small><a href=" {{ route('late.index') }} ">> late</a><a href="#"> > create</a></small>
            </div>
            <a class="btn btn-outline-secondary p-2" href="{{ route('late.index') }}"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Back</a>
        </div>
        <form class="card p-5" action="{{ route('late.store') }}" method="POST" enctype="multipart/form-data">
            @if (Session::get('failed'))
                <div class="alert alert-danger"> {{ Session::get('failed') }} </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success"> {{ Session::get('success') }} </div>
            @endif
            @csrf
            <div class="form-group">
                <label class="form-label" for="">Nama Siswa</label>
                <select class="form-select" name="student[]" id="student">
                    <option selected disabled hidden value=""></option>
                    @foreach ($student as $item)
                        <option value=" {{ $item['id'] }} "> {{ $item['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="">Tanggal</label>
                <input class="form-control" type="datetime-local" name="date_time_late">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Keterangan Keterlambatan</label>
                <input class="form-control" type="text" name="information">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Bukti</label>
                <input class="form-control" type="file" name="bukti">
            </div>
            <button class="btn-prior mt-3" type="submit">Kirim</button>
        </form>
    </section>
@endsection
