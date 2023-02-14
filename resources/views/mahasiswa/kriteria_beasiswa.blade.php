@extends('layouts.app')

@section('title', 'Data Beasiswa')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Pendataan Kriteria Beasiswa</h3>
            <p class="text-subtitle text-muted">Untuk Melihat Nilai Mahasiswa Berdasarkan Kriteria</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_mahasiswa')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Beasiswa</li>
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
                        <th class="text-center">Belum Ada Kriteria</th>
                        @endforelse
                        <th>Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>{{$mahasiswa->nama}}</td>
                        @forelse ($mahasiswa->subkriteria as $subkriteria)
                        <td>{{$subkriteria->subkriteria}}</td>
                        @empty
                        <td colspan="{{count($kriterias)}}" class="text-center">Tidak Ada Data</td>
                        @endforelse

                        {{-- JIKA MAHASISWA BELUM MEMPUNYAI KRITERIA MAKA LAKUKAN TAMBAH TERLEBIH DAHULU --}}
                        @if ($mahasiswa->subkriteria->isEmpty())
                        <td class="col-2">
                            @if ($mahasiswa->berkas_pribadi == null)
                            {{-- UPLOAD BERKAS PRIBADI JIKA BERKAS PRIBADI KOSONG --}}
                            <div></div>
                            @include('mahasiswa.berkas_pribadi')

                            {{-- JIKA TIDAK KOSONG --}}
                            @else
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="btn btn-outline-info float-sm-start mb-2 me-4"
                                    id="nav-tambah-kriteria-mahasiswa" data-bs-toggle="tab"
                                    data-bs-target="#nav-tambahKriteriaMahasiswa" type="button" role="tab"
                                    aria-controls="nav-tambahKriteriaMahasiswa" aria-selected="false">Tambah</button>
                                

                            </div>
                            @endif
                        </td>
                        {{-- JIKA SUKA MELAKUKAN TAMBAH MAKA MUNCULKAN TOMBOL EDIT DAN HAPUS --}}
                        @else
                        <td class="col-2">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="btn btn-outline-warning float-sm-start mb-2 me-4"
                                    id="nav-edit-kriteria-mahasiswa" data-bs-toggle="tab"
                                    data-bs-target="#nav-editKriteriaMahasiswa-{{$mahasiswa->id}}" type="button"
                                    role="tab" aria-controls="nav-editKriteriaMahasiswa"
                                    aria-selected="false">Edit</button>

                                

                                <form action="{{route('beasiswa.destroy', $mahasiswa->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                </tbody>
            </table>
            @include('mahasiswa.tambah_kriteria')
            @include('mahasiswa.edit_kriteria')

            <div>
            <!-- BUTTON  UPLOAD BERKAS PNDUKUN BEASISWA-->
            @if ($mahasiswa->berkas_beasiswa == null)
            <!-- Button Upload Berkas Beasiswa-->
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#berkasBeasiswa">
                <i class="bi bi-upload pe-2"></i>
                UPLOAD BERKAS BEASISWA
            </button>
            @include('mahasiswa.berkas_beasiswa')
            @endif
        </div>
            @if ($mahasiswa->berkas_pribadi == null)
                {{-- UPLOAD BERKAS PRIBADI JIKA BERKAS PRIBADI KOSONG --}}
                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <i class="bi bi-upload pe-2"></i>
                    UPLOAD ULANG BERKAS PRIBADI
                </button>
                @include('mahasiswa.berkas_pribadi')
            @endif
        </div>
    </div>
</section>
@endsection