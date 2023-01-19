@extends('layouts.app')

@section('title', 'List Mahasiswa')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Kriteria</h3>
            <p class="text-subtitle text-muted">Untuk Melihat List Kriteria</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Kriteria</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="col-12 col-md-12 order-md-12 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('kriteria.create')}}"
                                class="btn btn-primary">Tambah Kriteria</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="tabel_mahasiswa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Kriteria</th>
                        <th>Bobot</th>
                        <th>Jenis</th>
                        <th>Subkriteria</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kriterias as $kriteria)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kriteria->kode}}</td>
                        <td>{{$kriteria->kriteria}}</td>
                        <td>{{$kriteria->bobot}}</td>
                        <td>
                            @if ($kriteria->jenis == 'benefit')
                            <span class="badge bg-success">{{$kriteria->jenis}}</span>
                            @else
                            <span class="badge bg-secondary">{{$kriteria->jenis}}</span>
                            @endif
                        </td>
                        <td>
                            <ul>
                                @forelse ($subkriterias as $subkriteria)
                                <li>{{$subkriteria->subkriteria}}</li>
                                @empty
                                @endforelse
                            </ul>
                        </td>

                    </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection