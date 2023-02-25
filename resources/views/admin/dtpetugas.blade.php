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
                            <a class="nav-link" href="#">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Generate Laporan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <form action="/admin/petugas/store" method="POST" class="form-control mt-4 mb-4">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

                <h2 class="mt-4">Data Petugas</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->type !== 'siswa')
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $user->nama_petugas }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>

                                            <div class="btn-group">
                                                <a href="/admin/petugas/{{ $user->id }}/edit"
                                                    class="btn btn-warning">Edit</a>
                                            </div>
                                            <div class="btn-group">
                                                <form action="/admin/petugas/{{ $user->id }}" method="POST">
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
