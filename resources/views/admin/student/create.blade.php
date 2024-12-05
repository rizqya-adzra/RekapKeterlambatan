@extends('template.app', ['title' => 'Tambah Siswa'])

@section('konten-dinamis')
    <section class="container mt-2" style="width: 80%">
        <div class="d-flex justify-content-around align-items-center mb-4">
            <div>
                <h1 class="text-prior">Tambah Data Siswa</h1>
                <small><a href=" {{ route('student.index') }} ">> student</a><a href="#"> > create</a></small>
            </div>
            <a class="btn btn-outline-secondary p-2" href="{{ route('student.index') }}"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Back</a>
        </div>
        <form class="card p-5" action="{{ route('student.store') }}" method="POST">
            @if (Session::get('failed'))
                <div class="alert alert-danger"> {{ Session::get('failed') }} </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success"> {{ Session::get('success') }} </div>
            @endif
            @csrf
            <div class="form-group">
                <label class="form-label" for="">NIS</label>
                <input class="form-control" type="text" name="nis">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Nama</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Rombel</label>
                <select class="form-select" name="rombel_id[]" id="rombel_id">
                    <option selected disabled hidden value=""></option>
                    @foreach ($rombel as $item)
                        <option value=" {{ $item['id'] }} "> {{ $item['rombel'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="">Rayon</label>
                <select class="form-select" name="rayon_id[]" id="rayon_id">
                    <option selected disabled hidden value=""></option>
                    @foreach ($rayon as $item)
                        <option value=" {{ $item['id'] }} "> {{ $item['rayon'] }} </option>
                    @endforeach
                </select>
            </div>
            <button class="btn-prior mt-3" type="submit">Kirim</button>
        </form>
    </section>
@endsection
