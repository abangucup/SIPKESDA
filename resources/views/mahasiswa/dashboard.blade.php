@extends('layouts.app')

@section('title', 'Dashboard')

@section('heading')
<div class="page-heading">
    <h3>Selamat Datang {{auth()->user()->username}}</h3>
</div>
@endsection


@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5 shadow">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Kriteria</h6>
                                    <h6 class="font-extrabold mb-0">{{$kriterias->count()}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5 shadow">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Subkriteria</h6>
                                    <h6 class="font-extrabold mb-0">{{$subkriterias->count()}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5 shadow">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Mahasiswa</h6>
                                    <h6 class="font-extrabold mb-0">{{$mahasiswas->count()}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Pendaftar Terakhir</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Kampus</th>
                                            <th>Jurusan</th>
                                            <th>Prodi</th>
                                            <th>Tanggal Daftar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mahasiswas as $mahasiswa)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$mahasiswa->nama}}</td>
                                            <td>{{$mahasiswa->kampus}}</td>
                                            <td>{{$mahasiswa->jurusan}}</td>
                                            <td>{{$mahasiswa->prodi}}</td>
                                            <td>{{$mahasiswa->created_at}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Belum Ada Pendaftar</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection