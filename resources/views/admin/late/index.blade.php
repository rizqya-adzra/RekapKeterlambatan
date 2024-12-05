@extends('template.app', ['title' => 'Rekap Keterlambatan'])

@section('konten-dinamis')
<section class="container mt-2" style="width: 80%">
    <div class="d-flex justify-content-around align-items-center mb-4">
        <div>
            <h1 class="text-prior">Data Keterlambatan</h1>
            <small><a href="">> late</a></small>
        </div>
        <div class="d-flex" style="gap: 20px">
            <form action="" class="d-flex" style="gap: 7px">
                <input class="form-control border-search " type="date" placeholder="cari berdasarkan tanggal"
                    name="search" aria-label="Search">
                <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                <button class="btn btn-outline-secondary" type="submit">Clear</button>
            </form>
        </div>
        <a class="btn-prior" href=" {{ route('late.create') }} ">Tambah +</a>
    </div>
    @if (Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif
    <table class="table text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Keterangan Keterlambatan</th>
                <th>Bukti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($late as $index => $item)
                <tr>
                    <td> {{ ($late->currentPage() - 1) * $late->perPage() + ($index + 1) }} </td>
                    <td> {{ implode($item['student_id']) }} </td>
                    <td> {{ implode($item['student_id']) }} </td>
                    <td> {{ $item['date_time_late'] }} </td>
                    <td> {{ $item['information'] }} </td>
                    <td> <img style="width: 150px" src="{{ asset('storage/' . $item['bukti']) }}" alt=""> </td>
                    <td>
                        <a class="btn-edit" href="{{ route('rayon.edit', $item->id) }}">Edit</a>
                        <button class="btn-delete" onclick="deleteModal('{{ $item->id }}', '{{ $item->rombel }}')">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection