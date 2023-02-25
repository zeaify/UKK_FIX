@extends('layouts.app')
@section('content')
    <form action="/admin/petugas/{{ $petugas->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" aria-describedby="emailHelp" value="{{ $petugas->nama_petugas }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value="{{ $petugas->username }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ $petugas->email }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" value="{{ $petugas->password }}">
        </div>
        <h4 class="text-danger">Pastikan data yang terisi sudah sesuai</h4>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="/admin/petugas" class="btn btn-info">Back</a>
    </form>
@endsection
