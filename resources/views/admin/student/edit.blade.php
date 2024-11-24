@extends('template.app', ['title' => 'Edit Siswa'])

@section('konten-dinamis')
<section class="container mt-2" style="width: 80%">
    <div class="d-flex justify-content-around align-items-center mb-4">
        <h1 class="text-prior">Edit Data Siswa</h1>
        <a class="btn btn-outline-secondary p-2" href="{{ route('student.index') }}"><i class="fa fa-arrow-left"
                aria-hidden="true"></i> Back</a>
    </div>
    <form class="card p-5" action="{{ route('student.update', $student['id']) }}" method="POST">
            @if (Session::get('failed'))
                <div class="alert alert-danger"> {{ Session::get('failed') }} </div>
            @endif
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label class="form-label" for="">Nis</label>
                @error('nis')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
                <input type="text" class="form-control" name="nis" value="{{ $student['nis'] }}">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Nama</label>
                @error('name')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
                <input class="form-control" type="text" name="name" value="{{ $student['name'] }}">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Rombel</label>
                @error('rombel_id')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
                <select class="form-select" name="rombel_id[]" id="rombel_id">
                    <option selected disabled hidden value=""></option>
                    @foreach ($rombel as $item)
                        <option value=" {{ $item['id'] }} "> {{ $item['rombel'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="">Rayon</label>
                @error('rayon_id')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
                <select class="form-select" name="rayon_id[]" id="rayon_id">
                    <option selected disabled hidden value=""></option>
                    @foreach ($rayon as $item)
                        <option value=" {{ $item['id']  }} "> {{ $item['rayon'] }} </option>
                    @endforeach
                </select>
            </div>
            <button class="btn-prior mt-3" type="submit">Kirim</button>
        </form>
    </section>
@endsection
