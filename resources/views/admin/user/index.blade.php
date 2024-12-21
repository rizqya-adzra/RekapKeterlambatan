@extends('template.app', ['title' => 'Data Akun || Rekap Keterlambatan'])

@section('konten-dinamis')
    <section class="container" style="width: 80%">
        <div class="d-flex justify-content-around align-items-center mb-4">
            <div>
                <h1 class="text-prior">Data Akun</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                  </nav>
            </div>
            <div class="d-flex" style="gap: 20px">
                <form action="" class="d-flex" style="gap: 7px">
                    <input class="form-control border-search " type="text" placeholder="cari berdasarkan nama"
                        name="search" aria-label="Search">
                    <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <button class="btn btn-outline-secondary" type="submit">Clear</button>
                </form>
            </div>
            <a class="btn-prior" href=" {{ route('user.create') }} ">Tambah +</a>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Reset Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($user as $index => $item)
                    <tr>
                        <td> {{ ($user->currentPage() - 1) * $user->perPage() + ($index + 1) }} </td>
                        <td> {{ $item['name'] }} </td>
                        <td> {{ $item['email'] }} </td>
                        <td> {{ $item['role'] }} </td>
                        <td> 
                            <form action="{{ route('user.reset', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn-delete btn-sm">Reset Password</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn-edit" href="{{ route('user.edit', ['id' => $item->id]) }}">Edit</a>
                            <button class="btn-delete"
                                onclick="deleteModal('{{ $item->id }}', '{{ $item->name }}')">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" id="form-delete-akun" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data Akun</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            apakah anda yakin akan menghapus data Akun <span id="nama-akun"
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
            @if ($user->count())
                {{ $user->appends(['perPage' => request('perPage'), 'search' => request('search')])->links() }}
            @endif
        </div>
    </section>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function deleteModal(id, name) {
            let action = '{{ route('user.delete', ':id') }}';
            action = action.replace(':id', id);
            $('#form-delete-akun').attr('action', action);
            $('#deleteModal').modal('show');
            console.log(name);
            $('#nama-akun').text(name);
        }
    </script>
@endpush
