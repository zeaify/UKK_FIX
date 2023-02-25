@extends('layouts.app')
@section('content')
    <form action="/admin/pembayaran/{{ $p->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Petugas</label>
            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" aria-describedby="emailHelp" value="{{ $p->nama_petugas }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nisn</label>
            <input type="text" class="form-control" id="nisn" name="nisn" aria-describedby="emailHelp" value="{{ $p->nisn }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>
            <input type="text" class="form-control" id="tgl_bayar" name="tgl_bayar" aria-describedby="emailHelp" value="{{ $p->tgl_bayar }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Bulan Bayar</label>
            <input type="text" class="form-control" id="bulan_dibayar" name="bulan_dibayar" aria-describedby="emailHelp" value="{{ $p->bulan_dibayar }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tahun Bayar</label>
            <input type="text" class="form-control" id="tahun_dibayar" name="tahun_dibayar" aria-describedby="emailHelp" value="{{ $p->tahun_dibayar }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nominal Spp</label>
            <input type="text" class="form-control" id="nominal_spp" name="nominal_spp" aria-describedby="emailHelp" value="{{ $p->nominal_spp }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Bayar</label>
            <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" aria-describedby="emailHelp" value="{{ $p->jumlah_bayar }}">
        </div>
        <h4 class="text-danger">Pastikan data yang terisi sudah sesuai</h4>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="/admin/pembayaran" class="btn btn-info">Back</a>
    </form>
@endsection
