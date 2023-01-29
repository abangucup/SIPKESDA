<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Mahasiswa Penerima Beasiswa</h4>
    </center>
     
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Tempat & Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Kampus</th>
                <th>Jurusan</th>
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$mahasiswa->nama}}</td>
                <td>{{$mahasiswa->alamat}}</td>
                <td>{{$mahasiswa->no_hp}}</td>
                <td>{{$mahasiswa->tempat_lahir}}, {{$mahasiswa->tanggal_lahir}}</td>
                <td>{{$mahasiswa->jk}}</td>
                <td>{{$mahasiswa->kampus}}</td>
                <td>{{$mahasiswa->jurusan}}</td>
                <td>{{$mahasiswa->prodi}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
     
</body>

</html>