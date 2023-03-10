@extends('layouts.app')

@section('title', 'List Mahasiswa')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Mahasiswa</h3>
            <p class="text-subtitle text-muted">Untuk Melihat List Data Mahasiswa</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-body shadow">
            <table class="table table-striped" id="tabel_mahasiswa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Kampus</th>
                        <th>Jurusan</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$mahasiswa->nama}}</td>
                        <td>{{ $mahasiswa->nik }}</td>
                        <td>{{$mahasiswa->username}}</td>
                        <td>{{$mahasiswa->alamat}}</td>
                        <td>{{$mahasiswa->no_hp}}</td>
                        <td>{{$mahasiswa->kampus}}</td>
                        <td>{{$mahasiswa->jurusan}}</td>
                        <td>{{$mahasiswa->prodi}}</td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateBiodataMhs-{{ $mahasiswa->id }}">Update</button>
                        </td>
                    </tr>
                    @include('operator.modal_update_biodata_mhs')
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum Ada Mahasiswa Yang Mendaftar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
