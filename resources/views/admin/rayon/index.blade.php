@extends('template.app', ['title' => 'Data Rayon || Rekap Keterlambatan'])

@section('konten-dinamis')
<section class="container mt-2" style="width: 80%">
    <div class="d-flex justify-content-around align-items-center mb-4">
        <h1 class="text-prior">Data Rayon</h1>
        <div class="d-flex" style="gap: 20px">
            <form action="" class="d-flex" style="gap: 7px">
                <input class="form-control border-search" type="text" placeholder="cari berdasarkan rayon"
                    name="search" aria-label="Search">
                <button class="btn btn-search" type="submit"><i class="fa fa-search"
                        aria-hidden="true"></i></button>
                <button class="btn btn-outline-secondary" type="submit">Clear</button>
            </form>
        </div>
        <a class="btn-prior" href=" {{route('rayon.create')}} ">Tambah +</a>
    </div>
        @if (Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        <table class="table text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rayon</th>
                    <th>Pembimbing Siswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rayon as $index => $item)
                <tr>
                    <td> {{$index + 1}} </td>
                    <td> {{ $item['rayon'] }} </td>
                    <td> {{ implode($item['user']) }} </td>
                    <td>
                        <button class="btn-edit" onclick="editModal('{{ $item->id }}', '{{ $item->rombel }}')">Edit</button>
                        <button class="btn-delete" onclick="deleteModal('{{ $item->id }}', '{{ $item->rombel }}')">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" id="form-delete-rayon" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data Akun</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            apakah anda yakin akan menghapus data Rayon <span id="nama-rayon"
                                style="font-weight: bolder"></span> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Tetap Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function deleteModal(id, rayon) {
            let action = '{{ route('rayon.delete', ':id') }}';
            action = action.replace(':id', id);
            $('#form-delete-rayon').attr('action', action);
            $('#deleteModal').modal('show');
            console.log(rayon);
            $('#nama-rayon').text(rayon);
        }
    </script>
@endpush
