@extends('template.app', ['title' => 'Data Siswa || Rekap Keterlambatan'])

@section('konten-dinamis')
<section class="container" style="width: 80%">
    <div class="d-flex justify-content-around align-items-center mb-4">
        <div>
            <h1 class="text-prior">Data Siswa</h1>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Student</li>
                </ol>
              </nav>
        </div>
        <div class="d-flex" style="gap: 20px">
            <form action="" class="d-flex" style="gap: 7px">
                <input class="form-control border-search" type="text" placeholder="cari berdasarkan nama"
                    name="search" aria-label="Search">
                <button class="btn btn-search" type="submit"><i class="fa fa-search"
                        aria-hidden="true"></i></button>
                <button class="btn btn-outline-secondary" type="submit">Clear</button>
            </form>
        </div>
        <a class="btn-prior" href=" {{route('student.create')}} ">Tambah +</a>
    </div>
    <form method="GET" action="" class="d-flex align-items-center mb-3" style="gap: 15px">
        <label for="perPage" class="form-label">Tampilkan</label>
        <select name="perPage" id="perPage" class="form-select" style="width: auto" onchange="this.form.submit()">
            <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
            <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
        </select>
        <input type="hidden" name="search" value="{{ request('search') }}">
    </form>
        @if (Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        <table class="table text-center table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Rombel</th>
                    <th>Rayon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($student as $index => $item)
                <tr>
                    <td> {{ ($student->currentPage() - 1) * $student->perPage() + ($index + 1) }} </td>
                    <td> {{ $item['nis'] }} </td>
                    <td> {{ $item->name }} </td>
                    <td> {{ $item->rombel->rombel }} </td>
                    <td> {{ $item->rayon->rayon }} </td>
                    <td>
                        <a class="btn-edit" href="{{ route('student.edit', $item['id']) }}">Edit</a>
                        <button class="btn-delete" onclick="deleteModal('{{ $item->id }}', '{{ $item->name }}')">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" id="form-delete-siswa" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            apakah anda yakin akan menghapus data Siswa <span id="nama-siswa"
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
        <div class="mt-3">
            @if ($student->count())
                {{ $student->appends(['perPage' => request('perPage'), 'search' => request('search')])->links() }}
            @endif
        </div>
</section>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function deleteModal(id, name) {
            let action = '{{ route('student.delete', ':id') }}';
            action = action.replace(':id', id);
            $('#form-delete-siswa').attr('action', action);
            $('#deleteModal').modal('show');
            $('#nama-siswa').text(name); 
        }
    </script>
        
@endpush