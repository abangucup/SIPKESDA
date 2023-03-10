@extends('layouts.app')

@section('title', 'List Mahasiswa')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Beasiswa</h3>
            <p class="text-subtitle text-muted">Untuk Melihat Data Penerima dan Detail Beasiswa</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('operator.beasiswa')}}">Data Beasiswa</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Penerima</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>Detail Biodata Mahasiswa {{$mahasiswa->nama}}</h4>
            </div>
            <div class="card-body shadow">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Nama</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$mahasiswa->nama}}" disabled
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">Tempat Lahir & Tanggal Lahir</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control"
                                        placeholder="{{$mahasiswa->tempat_lahir}}, {{$mahasiswa->tanggal_lahir}}"
                                        disabled id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">Jenis Kelamin</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$mahasiswa->jk}}" disabled
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">Alamat</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$mahasiswa->alamat}}"
                                        disabled id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">Kampus / Jurusan / Prodi</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control"
                                        placeholder="{{$mahasiswa->kampus}} / {{$mahasiswa->jurusan}} / {{$mahasiswa->prodi ?? '-'}}"
                                        disabled id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">No. HP / WA</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$mahasiswa->no_hp}}" disabled
                                        id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">username</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$mahasiswa->username}}"
                                        disabled id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>

                                <label for="first-name-icon">Berkas Pribadi</label>
                                <div class="position-relative mb-3">
                                    <a href="{{$mahasiswa->berkas_pribadi != null ? asset('storage/mahasiswa/pribadi/'.$mahasiswa->berkas_pribadi) : '#'}}"
                                        class="btn btn-outline-secondary"><i
                                            class="bi bi-download pe-2"></i>Download</a>

                                </div>
                                <div class="position-relative mb-3">
                                    <form action="{{route('reupload-pribadi', $mahasiswa->id)}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-bootstrap-reboot"></i> Reupload</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>Detail Kriteria Beasiswa {{$mahasiswa->nama}}</h4>
            </div>
            <div class="card-body shadow">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                @forelse ($subkriterias as $subkriteria)
                                <label for="first-name-icon">{{$subkriteria->kriteria->kriteria}}</label>
                                <div class="position-relative mb-3">
                                    <input type="text" class="form-control" placeholder="{{$subkriteria->subkriteria}}"
                                        disabled id="first-name-icon">
                                    <div class="form-control-icon">
                                        <i class="bi bi-check"></i>
                                    </div>
                                </div>
                                
                               
                                @empty
                                Kosong
                                @endforelse
                                @if($mahasiswa->subkriteria->isNotEmpty())
                                <label for="first-name-icon">Berkas Beasiswa</label>
                                <div class="position-relative mb-3">
                                    <a href="{{$mahasiswa->berkas_beasiswa != null ? asset('storage/mahasiswa/beasiswa/'.$mahasiswa->berkas_beasiswa) : '#'}}"
                                        class="btn btn-outline-secondary"><i
                                            class="bi bi-download pe-2"></i>Download</a>
                                </div>
                                 <div class="position-relative mb-3">
                                    <form action="{{route('reupload', $mahasiswa->id)}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-bootstrap-reboot"></i> Reupload</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection