@extends('template.app', ['title' => 'Edit Rayon'])

@section('konten-dinamis')
<section class="container mt-2" style="width: 80%">
    <div class="d-flex justify-content-around align-items-center mb-4">
        <div>
            <h1 class="text-prior">Edit Data Rayon</h1>
            <small><a href=" {{ route('rayon.index') }} ">> rayon</a><a href="#"> > edit</a></small>
        </div>
        <a class="btn btn-outline-secondary p-2" href="{{ route('rayon.index') }}"><i class="fa fa-arrow-left"
                aria-hidden="true"></i> Back</a>
    </div>
    <form class="card p-5" action="{{ route('rayon.update', $rayon['id']) }}" method="POST">
            @if (Session::get('failed'))
                <div class="alert alert-danger"> {{ Session::get('failed') }} </div>
            @endif
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label class="form-label" for="">Rayon</label>
                @error('rayon')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
                <input class="form-control" type="text" name="rayon" value=" {{ $rayon['rayon']}} ">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Pembimbing Siswa</label>
                @error('user')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
                <select class="form-select" name="user_id" id="user">
                    <option selected disabled hidden value=""></option>
                    @foreach ($user as $item)
                        <option value=" {{ $item['id'] }} " {{ (int) old('user', $rayon->user->id) == $item->id ? 'selected' : '' }}> {{ $item['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <button class="btn-prior mt-3" type="submit">Kirim</button>
        </form>
    </section>
@endsection
