@extends('layouts.app')

@section('title', 'List Mahasiswa')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kriteria Beasiswa</h3>
            <p class="text-subtitle text-muted">Untuk Melihat Nilai Mahasiswa Berdasarkan Kriteria</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kriteria Beasiswa</li>
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
                        <th class="col-2">Nama</th>
                        @forelse ($kriterias as $kriteria)
                        <th>{{$kriteria->kriteria}}</th>
                        @empty
                        <th>Belum Ada Kriteria</th>
                        @endforelse
                        <th>Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>{{$mahasiswa->nama}}</td>
                        @forelse ($mahasiswa->subkriteria as $subkriteria)
                        <td>{{$subkriteria->nilai}}</td>
                        @empty
                        <td colspan="{{count($kriterias)}}" class="text-center">Tidak Ada Data</td>
                        @endforelse
                        <td class="col-2">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="btn btn-outline-warning float-sm-start mb-2 me-4"
                                    id="nav-kriteria-mahasiswa" data-bs-toggle="tab"
                                    data-bs-target="#nav-kriteriaMahasiswa" type="button" role="tab"
                                    aria-controls="nav-kriteriaMahasiswa" aria-selected="false">Edit</button>
                                <form action="{{route('beasiswa.destroy', $mahasiswa->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="card col-sm-6">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-kriteriaMahasiswa" role="tabpanel"
                        aria-labelledby="nav-kriteria-mahasiswa">123</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection