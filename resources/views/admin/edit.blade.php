@extends('layouts.app')
@section('content')
    <form action="/admin/home/{{ $siswa->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nisn</label>
            <input type="number" class="form-control" id="nisn" name="nisn" aria-describedby="emailHelp" value="{{ $siswa->nisn }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nis</label>
            <input type="text" class="form-control" id="nis" name="nis" aria-describedby="emailHelp" placeholder="177013" value="{{ $siswa->nis }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="{{ $siswa->nama }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-control">
                @foreach ($kelas_edit as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }} {{ $k->kompetensi_keahlian }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" value="{{ $siswa->alamat }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No Telpon</label>
            <input type="number" class="form-control" id="no_telp" name="no_telp" aria-describedby="emailHelp" value="{{ $siswa->no_telp }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">SPP</label>
            <select name="spp_id" id="spp_id" class="form-control">
                @foreach ($spp as $sp)
                    <option value="{{ $sp->id }}">{{ $sp->nominal }}</option>
                @endforeach
            </select>
        </div>
        <h4 class="text-danger">Pastikan data yang terisi sudah sesuai</h4>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="/admin/home" class="btn btn-info">Back</a>

    </form>
@endsection
