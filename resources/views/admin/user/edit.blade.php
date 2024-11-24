@extends('template.app', ['title' => 'Edit User'])

@section('konten-dinamis')
<section class="container mt-2" style="width: 80%">
    <div class="d-flex justify-content-around align-items-center mb-4">
        <h1 class="text-prior">Edit Data Akun</h1>
        <a class="btn btn-outline-secondary p-2" href="{{ route('user.index') }}"><i class="fa fa-arrow-left"
                aria-hidden="true"></i> Back</a>
    </div>
    <form class="card p-5" action="{{ route('user.update', $user['id']) }}" method="POST">
            @if (Session::get('failed'))
                <div class="alert alert-danger"> {{ Session::get('failed') }} </div>
            @endif
            @csrf
            @method('PATCH')
                <div class="form-group">
                    <label class="form-label" for="">Nama</label>
                    <input class="form-control" type="text" name="name" value="{{ $user['name'] }}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $user['email'] }}">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option hidden disabled></option>
                        <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="ps" {{ $user['role'] == 'ps' ? 'selected' : '' }}>Pembimbing Siswa (ps)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password">
                </div>
                <button class="btn-prior mt-3" type="submit">Kirim</button>
            </form>
    </section>
@endsection