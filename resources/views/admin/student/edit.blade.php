@extends('template.app', ['title' => 'Edit Siswa'])

@section('konten-dinamis')
<section class="container mt-2" style="width: 80%">
    <div class="d-flex justify-content-around align-items-center mb-4">
        <div>
            <h1 class="text-prior">Edit Data Siswa</h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active"><a href="{{ route('student.index') }}">Student</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
        </div>
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
                <select class="form-select" name="rombel_id" id="rombel_id">
                    <option selected disabled hidden value=""></option>
                    @foreach ($rombel as $item)
                        <option value=" {{ $item->id }} " {{ old('rombel', $student->rombel->id) == $item->id ? 'selected' : '' }}> {{ $item['rombel'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="">Rayon</label>
                @error('rayon_id')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
                <select class="form-select" name="rayon_id" id="rayon_id">
                    <option selected disabled hidden value=""></option>
                    @foreach ($rayon as $item)
                        <option value=" {{ $item->id  }} " {{ old('rayon', $student->rayon->id) == $item->id ? 'selected' : '' }}> {{ $item['rayon'] }} </option>
                    @endforeach
                </select>
            </div>
            <button class="btn-prior mt-3" type="submit">Kirim</button>
        </form>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#rombel_id').select2({
                placeholder: "Pilih Rombel",
                allowClear: true
            });
        });

        $(document).ready(function() {
            $('#rayon_id').select2({
                placeholder: "Pilih Rayon",
                allowClear: true
            });
        });
    </script>
@endpush