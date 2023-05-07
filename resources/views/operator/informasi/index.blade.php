@extends('layouts.app')

@section('title', 'List Informasi')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Informasi</h3>
            <p class="text-subtitle text-muted">Data informasi kepada penerima beasiswa</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Informasi</li>
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
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"><a
                        href="{{ route('informasi.create') }}" type="button" class="btn btn-outline-primary">
                        Tambah Informasi
                    </a>

                    {{-- @include('operator.modal_tambah') --}}
                </nav>
            </div>
        </div>
        <div class="card-body shadow">
            <table class="table table-striped" id="tabel_mahasiswa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informasis as $informasi)
                    <tr>
                        <td>{{ $informasi->judul }}</td>
                        <td>{{ $informasi->deskripsi }}</td>
                        <td>
                            <a href="{{ route('informasi.edit') }}">Edit</a>
                            <a href="{{ route('informasi.destroy') }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    {{-- @forelse ($mahasiswas as $mahasiswa)
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
                            <button class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#updateBiodataMhs-{{ $mahasiswa->id }}">Update</button>
                        </td>
                    </tr>
                    @include('operator.modal_update_biodata_mhs')
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum Ada Mahasiswa Yang Mendaftar</td>
                    </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection
