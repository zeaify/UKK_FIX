@extends('layouts.app')
@section('admin')
    {{-- <h1>Halaman Admin</h1>
    <a href="/admin/home/create" class="btn btn-success">Tambahkan Siswa</a> --}}

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
                <form action="/admin/home/store" method="POST" class="form-control mt-4 mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nisn</label>
                        <input type="number" class="form-control" id="nisn" name="nisn"
                            aria-describedby="emailHelp" placeholder="3457638">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nis</label>
                        <input type="text" class="form-control" id="nis" name="nis"
                            aria-describedby="emailHelp" placeholder="177013" value="228933">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            aria-describedby="emailHelp" placeholder="Yukinoshita Yukino">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }} {{ $k->kompetensi_keahlian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            aria-describedby="emailHelp" placeholder="Ex. Ambarawa">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp"
                            aria-describedby="emailHelp" placeholder="084651654894">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">SPP</label>
                        <select name="spp_id" id="spp_id" class="form-control">
                            @foreach ($spp as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->nominal }}</option>
                            @endforeach
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
                                <th scope="col">Nisn</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">spp</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->type !== 'admin' && $user->type !== 'pegawai')
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $user->nisn}}</td>
                                        <td>{{ $user->nis }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->kelas->nama_kelas }} {{ $user->kelas->kompetensi_keahlian }}</td>
                                        <td>{{ $user->alamat }}</td>
                                        <td>{{ $user->no_telp }}</td>
                                        <td>{{ $user->spp->nominal }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/admin/home/{{ $user->id }}/edit"
                                                    class="btn btn-warning">Edit</a>
                                            </div>
                                            <div class="btn-group">
                                                <form action="/admin/home/{{ $user->id }}" method="POST">
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
