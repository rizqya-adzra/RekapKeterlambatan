@extends('template.app', ['title' => 'Tambah Rombel'])

@section('konten-dinamis')
<section class="container mt-2" style="width: 80%">
    <div class="d-flex justify-content-around align-items-center mb-4">
        <div>
            <h1 class="text-prior">Tambha Data Rombel</h1>
            <small><a href=" {{ route('rombel.index') }} ">> rombel</a><a href="#"> > create</a></small>
        </div>
        <a class="btn btn-outline-secondary p-2" href="{{ route('rombel.index') }}"><i class="fa fa-arrow-left"
            aria-hidden="true"></i> Back</a>
    </div>
        <form class="card p-5" action="{{ route('rombel.store') }}" method="POST">
            @if (Session::get('failed'))
                <div class="alert alert-danger"> {{ Session::get('failed') }} </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success"> {{ Session::get('success') }} </div>
            @endif
            @csrf
                <div class="form-group">
                    <label class="form-label" for="">Rombel</label>
                    @error('rombel')
                        <small class="text-danger"> {{ $message }} </small>    
                    @enderror
                    <input class="form-control" type="text" name="rombel">
                </div>
                <button class="btn-prior mt-3" type="submit">Kirim</button>
            </form>
    </section>
@endsection