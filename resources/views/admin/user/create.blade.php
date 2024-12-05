@extends('template.app', ['title' => 'Tambah User'])

@section('konten-dinamis')
    <section class="container mt-2" style="width: 80%">
        <div class="d-flex justify-content-around align-items-center mb-4">
            <div>
                <h1 class="text-prior">Tambah Data Akun</h1>
                <small><a href=" {{ route('user.index') }} ">> user</a><a href="#"> > create</a></small>
            </div>
            <a class="btn btn-outline-secondary p-2" href="{{ route('user.index') }}"><i class="fa fa-arrow-left"
                aria-hidden="true"></i> Back</a>
        </div>
        <form class="card p-5 " action="{{ route('user.store') }}" method="POST">
            @if (Session::get('failed'))
                <div class="alert alert-danger"> {{ Session::get('failed') }} </div>
            @endif
            @csrf
            <div class="form-group">
                <label class="form-label" for="">Nama</label>
                @error('name')
                        <small class="text-danger"> {{ $message }} </small>    
                @enderror
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label class="form-label" for="">Email</label>
                @error('email')
                        <small class="text-danger"> {{ $message }} </small>    
                @enderror
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Role</label>
                @error('role')
                        <small class="text-danger"> {{ $message }} </small>    
                @enderror
                <select name="role" id="role" class="form-select">
                    <option selected hidden></option>
                    <option value="admin">Admin</option>
                    <option value="ps">Pembimbing Siswa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Password</label>
                @error('password')
                        <small class="text-danger"> {{ $message }} </small>    
                @enderror
                <input type="text" class="form-control" name="password">
            </div>
            <button class="btn-prior mt-4" type="submit">Kirim</button>
        </form>
    </section>
@endsection
