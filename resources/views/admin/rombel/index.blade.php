@extends('template.app', ['title' => 'Data Rombel || Rekap Keterlambatan'])

@section('konten-dinamis')
    <section class="container" style="width: 80%">
        <div class="d-flex justify-content-around align-items-center mb-4">
            <div>
                <h1 class="text-prior">Data Rombel</h1>
                <small><a href=" # ">> rombel</a></small>
            </div>
            <div class="d-flex" style="gap: 20px">
                <form action="" class="d-flex" style="gap: 7px">
                    <input class="form-control border-search " type="text" placeholder="cari berdasarkan nama"
                        name="search" aria-label="Search">
                    <button class="btn btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <button class="btn btn-outline-secondary" type="submit">Clear</button>
                </form>
            </div>
            <a class="btn-prior" href=" {{ route('rombel.create') }} ">Tambah +</a>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        <table class="table text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rombel</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rombel as $index => $item)
                    <tr>
                        <td> {{ ($rombel->currentPage() - 1) * $rombel->perPage() + ($index + 1) }} </td>
                        <td> {{ $item['rombel'] }} </td>
                        <td>
                            <button class="btn-edit"
                                onclick="editModal('{{ $item->id }}', '{{ $item->rombel }}')">Edit</button>
                            <button class="btn-delete"
                                onclick="deleteModal('{{ $item->id }}', '{{ $item->rombel }}')">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" id="form-delete-rombel" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data Rombel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            apakah anda yakin akan menghapus data Rombel <span id="nama-rombel"
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
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editStockLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-edit-rombel" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editStockLabel">Edit Rombel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="rombel-id">
                            <div class="form-group">
                                <label for="rombel" class="form-label">Nama Rombel</label>
                                <input type="text" name="rombel" id="rombel" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="mb-5">
            @if ($rombel->count())
                {{ $rombel->links() }}
            @endif
        </div>
    </section>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function deleteModal(id, name) {
            let action = '{{ route('rombel.delete', ':id') }}';
            action = action.replace(':id', id);
            $('#form-delete-rombel').attr('action', action);
            $('#deleteModal').modal('show');
            console.log(name);
            $('#nama-rombel').text(name);
        }
    </script>
    <script>
        // Fungsi untuk menampilkan modal edit stok
        function editModal(id, rombel) {
            $('#rombel-id').val(id);
            $('#rombel').val(rombel);
            $('#editModal').modal('show');
        }

        // Event listener untuk submit form update stok
        $('#form-edit-rombel').on('submit', function(e) {
            e.preventDefault();

            let id = $('#rombel-id').val();
            let rombel = $('#rombel').val();
            let actionUrl = "{{ url('/rombel/edit') }}/" + id;

            // Kirim request AJAX untuk update stok
            $.ajax({
                url: actionUrl,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    rombel: rombel
                },
                success: function(response) {
                    $('#editModal').modal('hide');
                    location.reload();
                    alert('Nama rombel berhasil di Update!')
                },
                error: function(err) {
                    alert(err.responseJSON.failed);
                }
            });
        });
    </script>
@endpush
