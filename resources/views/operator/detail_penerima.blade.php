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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Detail Kriteria Beasiswa --}}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Berkas Beasiswa --}}
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="float-start">Berkas {{$mahasiswa->nama}}</h4>
                {{-- @if($mahasiswa->status_berkas != null)
                <button class="btn btn-warning float-end me-4"><i class="bi bi-check-circle pe-2"></i>
                    Verifikasi</button>
                @else --}}
                {{-- <button class="btn btn-secondary float-end me-4"><i class="bi bi-download pe-2"></i>
                    Download</button> --}}
                {{-- <a href="{{ route('verifikasi-berkas', $mahasiswa->id) }}"
                    class="btn btn-success float-end me-4"><i class="bi bi-check pe-2"></i> Verifikasi</a> --}}
                <!-- Button trigger modal -->
                {{-- <button type="submit" class="btn btn-primary" class="btn btn-secondary float-end me-4"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button> --}}
                <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="btn btn-outline-success float-end me-4"><i class="bi bi-check-circle pe-2"></i>
                    Verifikasi</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{route('verifikasi')}}" method="POST">
                                @csrf
                                <div class="modal-body ">
                                    <label for="">ID Mahasiswa : </label>
                                    <input type="text" class="form-control mb-4" name="mahasiswa_id"
                                        value="{{ $mahasiswa->id }}" readonly>
                                    <label>Verifikasi Berkas : </label>
                                    <div class="form-group">
                                        <select name="status_berkas" class="form-select">
                                            <option value="diterima">Lulus Berkas</option>
                                            <option value="ditolak">Berkas Ditolak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary">Verif</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <a href="{{ route('download-berkas', $mahasiswa->id) }}" class="btn btn-secondary float-end me-4"><i
                        class="bi bi-download pe-2"></i> Download</a>
            </div>
            <div class="card-body shadow">
                <div class="form-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Surat Permohonan Bantuan Studi</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->surat_permohonan ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Surat Keterangan Selesai Proposal Skripsi</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->surat_keterangan_selesai_proposal ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Transkip Nilai</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->transkip_nilai ?? '' }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Kartu Tanda Mahasiswa</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->ktm ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Kartu Tanda Penduduk</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->ktp ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Kartu Keluarga</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->kk ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Buku Tabungan</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->rekening_aktif ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Surat Keterangan Aktif Kuliah</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->surat_aktif_kuliah ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Surat Keterangan Bebas Beasiswa</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->surat_keterangan_bebas_beasiswa ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Surat Pernytaan Bukan ASN</label>
                                <div class="position-relative mb-3">
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ $mahasiswa->berkas->pernyataan_asn ?? ''}}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection