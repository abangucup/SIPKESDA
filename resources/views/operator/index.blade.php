@extends('layouts.app')

@section('title', 'List Mahasiswa')

@section('heading')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Operator</h3>
            <p class="text-subtitle text-muted">Untuk Melihat List Operator Yang Ada</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Operator</li>
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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard_operator')}}"
                                class="btn btn-primary">Tambah Operator</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="tabel_mahasiswa">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($operators as $operator)
                    <tr>
                        <td>{{$mahasiswa->nama}}</td>
                        <td>{{$mahasiswa->username}}</td>
                        <td>{{$mahasiswa->role}}</td>
                    </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection