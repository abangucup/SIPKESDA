@extends('layouts.app')

@section('title', 'Mahasiswa - Dashboard')

@section('heading')

@section('heading')
<div class="page-heading">
    <h3>Selamat Datang {{auth()->user()->username}}</h3>
</div>
@endsection
@endsection

@section('content')
<div class="row">
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
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
            <div class="card-body px-3 py-4-5">
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
            <div class="card-body px-3 py-4-5">
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
@endsection