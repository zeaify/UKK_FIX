<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="table-responsive container mt-5">
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
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $p)
                    <tr>
                        <td>{{ $j++ }}</td>
                        <td>{{ $p->nama_petugas }}</td>
                        <td>{{ $p->nisn }}</td>
                        <td>{{ $p->tgl_bayar }}</td>
                        <td>{{ $p->bulan_dibayar }}</td>
                        <td>{{ $p->tahun_dibayar }}</td>
                        <td>{{ $p->nominal_spp }}</td>
                        <td>{{ $p->jumlah_bayar }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script type="text/javascript">
            windows.print();
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>
