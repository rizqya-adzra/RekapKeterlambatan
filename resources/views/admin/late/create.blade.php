@extends('template.app', ['title' => 'Tambah Keterlambatan'])

@section('konten-dinamis')
    <section class="container mt-2" style="width: 80%">
        <div class="d-flex justify-content-around align-items-center mb-4">
            <div>
                <h1 class="text-prior">Tambah Data Keterlambatan</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active"><a href="{{ route('late.index') }}">Late</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                  </nav>
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
                <select class="form-select" name="student" id="student">
                    <option selected disabled hidden value=""></option>
                    @foreach ($student as $item)
                        <option value=" {{ $item->id }} "> {{ $item['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="form-label mt-3" for="">Tanggal</label>
                <input class="form-control" type="datetime-local" name="date_time_late" value="{{ $now }}">
            </div>
            <div class="form-group">
                <label class="form-label mt-3" for="">Keterangan Keterlambatan</label>
                <input class="form-control" type="text" name="information">
            </div>
            <div class="form-group">
                <label class="form-label mt-3" for="">Bukti</label>
                <input class="form-control" type="file" name="bukti" id="bukti"
                    style="border-left: 13px solid #608BC1 ">
                <div class="mt-3">
                    <img id="img-preview" src="" alt="Pratinjau Gambar"
                        style="display: none; max-width: 200px; max-height: 200px; border: 1px solid #ccc; padding: 5px;">
                </div>
            </div>
            <button class="btn-prior mt-3" type="submit">Kirim</button>
        </form>
    </section>
@endsection

@push('script')
    <script>
        document.getElementById('bukti').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('img-preview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    </script>
@endpush
