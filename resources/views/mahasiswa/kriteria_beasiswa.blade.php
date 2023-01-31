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
                        @if ($mahasiswa->subkriteria->isEmpty())
                        <td class="col-2">
                            @if ($mahasiswa->berkas_pribadi == null)
                            <!-- Button Upload Berkas -->
                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Tambah
                            </button>

                            <!-- Modal Upload Berkas-->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{route('berkas.pribadi')}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Upload Berkas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Berkas Pribadi</label>
                                                    <input class="form-control" type="file" id="formFile"
                                                        name="berkas_pribadi" required>
                                                    <span class="text-secondary"><sub>*.zip/rar (KTP, KK, KTM, Surat
                                                            Bukan
                                                            ASN, Surat Tidak Menerima Beasiswa Dari Sumber Lain,
                                                            Surat Aktif Kuliah, Surat Permohonan Bantuan Studi,
                                                            Proposal/Skripsi, Fotocopy Buku Rekening)</sub> </span>
                                                </div>
                                                @if ($kriterias->isNotEmpty())
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Berkas Beasiswa</label>
                                                    <input class="form-control" type="file" id="formFile"
                                                        name="berkas_beasiswa" required>
                                                    <span class="text-secondary"><sub>*.zip / rar
                                                            (@foreach ($kriterias as $kriteria)
                                                            {{$kriteria->kriteria}},
                                                            @endforeach)
                                                        </sub>
                                                    </span>
                                                </div>
                                                @endif

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @else
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="btn btn-outline-info float-sm-start mb-2 me-4" id="nav-tambah-kriteria-mahasiswa"
                data-bs-toggle="tab" data-bs-target="#nav-tambahKriteriaMahasiswa" type="button" role="tab"
                aria-controls="nav-tambahKriteriaMahasiswa" aria-selected="false">Tambah</button>
        </div>
        @endif
        </td>
        @else
        <td class="col-2">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="btn btn-outline-warning float-sm-start mb-2 me-4" id="nav-edit-kriteria-mahasiswa"
                    data-bs-toggle="tab" data-bs-target="#nav-editKriteriaMahasiswa-{{$mahasiswa->id}}" type="button"
                    role="tab" aria-controls="nav-editKriteriaMahasiswa" aria-selected="false">Edit</button>
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

        {{-- Tambah Kriteria --}}
        <div class="card col-sm-12">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-tambahKriteriaMahasiswa" role="tabpanel"
                    aria-labelledby="nav-tambah-kriteria-mahasiswa">

                    @if ($mahasiswa->berkas_beasiswa == null)
                    <!-- Button Upload Berkas Beasiswa-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#berkasBeasiswa">
                        Tambah
                    </button>

                    <!-- Modal Upload Berkas Beasiswa-->
                    <div class="modal fade" id="berkasBeasiswa" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{route('berkas.beasiswa')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Upload Berkas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Berkas Beasiswa</label>
                                            <input class="form-control" type="file" id="formFile" name="berkas_beasiswa"
                                                required>
                                            <span class="text-secondary"><sub>*.zip/rar
                                                    (@foreach ($kriterias as $kriteria)
                                                    {{$kriteria->kriteria}},
                                                    @endforeach)
                                                </sub>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @else
                    <div class="d-flex justify-content-center">
                        <form class="form form-vertical col-sm-4" action="{{route('beasiswa.store')}}" method="POST">
                            @csrf
                            @forelse ($kriterias as $kriteria)
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">{{$kriteria->kriteria}}</label>
                                    <div class="position-relative">
                                        <select name="subkriteria_id[]"
                                            class="form-select form-control form-control-lg">
                                            @forelse ($kriteria->subkriteria as $subkriteria)
                                            <option value="{{$subkriteria->id}}">{{$subkriteria->subkriteria}} -
                                                Nilai : ({{$subkriteria->nilai}})
                                            </option>
                                            @empty
                                            <option value="#">Tidak Ada Subkriteria</option>
                                            @endforelse
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty
                            <h3>Belum Ada Kriteria</h3>
                            @endforelse
                            @if ($kriterias != null)

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                            @endif
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- End Tambah --}}

        {{-- Edit Kriteria --}}
        <div class="card col-sm-12">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-editKriteriaMahasiswa-{{$mahasiswa->id}}" role="tabpanel"
                    aria-labelledby="nav-edit-kriteria-mahasiswa">
                    <div class="d-flex justify-content-center">
                        <form class="form form-vertical col-sm-4" action="{{route('beasiswa.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            @forelse ($kriterias as $kriteria)
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">{{$kriteria->kriteria}}</label>
                                    <div class="position-relative">
                                        <select name="subkriteria_id[]"
                                            class="form-select form-control form-control-lg">
                                            @forelse ($kriteria->subkriteria as $subkriteria)
                                            <option value="{{$subkriteria->id}}">{{$subkriteria->subkriteria}}
                                            </option>
                                            @empty
                                            <option value="#">Tidak Ada Subkriteria</option>
                                            @endforelse
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h3>Belum Ada Kriteria</h3>
                            @endforelse
                            @if ($kriterias != null)

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- End Edit --}}
    </div>
    </div>
</section>
@endsection