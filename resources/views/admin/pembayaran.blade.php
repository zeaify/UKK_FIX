@extends('layouts.app')
@section('admin')
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse fixed">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/admin/home">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Data Siswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/petugas">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Data Petugas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/pembayaran">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Entri Pembayaran
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/cetak" target="_blank">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Generate Laporan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <form action="/admin/pembayaran/store" method="POST" class="form-control mt-4 mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nisn</label>
                        <select name="nisn_id" id="nisn_id" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->nisn }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Bulan Dibayar</label>
                        <input type="text" name="bulan_dibayar" id="bulan_dibayar" class="form-control"
                            placeholder="ex. Januari">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tahun Dibayar</label>
                        <input type="number" min="2020" name="tahun_dibayar" id="tahun_dibayar" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Spp</label>
                        <select name="spp_id" id="spp_id" class="form-control">
                            @foreach ($spp as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->nominal }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah Bayar</label>
                        <select name="jumlah_bayar" id="jumlah_bayar" class="form-control">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i * $user->spp->nominal }}">{{ $i }} Bulan
                                    {{ $i * $user->spp->nominal }}</option>
                            @endfor
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

                <h2>Data Siswa</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Petugas</th>
                                <th scope="col">Nisn</th>
                                <th scope="col">Tanggal Bayar</th>
                                <th scope="col">Bulan Bayar</th>
                                <th scope="col">Tahun Bayar</th>
                                <th scope="col">Spp</th>
                                <th scope="col">Jumlah Bayar</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $p)
                                @if ($user->type !== 'admin' && $user->type !== 'pegawai')
                                    <tr>
                                        <td>{{ $j++ }}</td>
                                        <td>{{ $p->nama_petugas }}</td>
                                        <td>{{ $p->nisn }}</td>
                                        <td>{{ $p->tgl_bayar }}</td>
                                        <td>{{ $p->bulan_dibayar }}</td>
                                        <td>{{ $p->tahun_dibayar }}</td>
                                        <td>{{ $p->nominal_spp }}</td>
                                        <td>{{ $p->jumlah_bayar }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/admin/pembayaran/{{ $p->id }}/edit"
                                                    class="btn btn-warning">Edit</a>
                                            </div>
                                            <div class="btn-group">
                                                <form action="/admin/pembayaran/{{ $p->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="delete" class="btn btn-danger">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
@endsection
