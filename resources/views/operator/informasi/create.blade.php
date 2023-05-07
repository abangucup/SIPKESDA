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
        <form action="{{route('petugas.store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <label>Nama Opeator: </label>
                <div class="form-group">
                    <input type="text" placeholder="Nama Operator" class="form-control" name="nama" required>
                </div>
                <label>Email: </label>
                <div class="form-group">
                    <input type="email" placeholder="Email" class="form-control" name="email" required>
                </div>
                <label>Username: </label>
                <div class="form-group">
                    <input type="text" placeholder="Username" class="form-control" name="username" required>
                </div>
                <label>Password: </label>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" name="password" required>
                </div>
                <label>No HP / WA: </label>
                <div class="form-group">
                    <input type="text" placeholder="Nomor HP" class="form-control" name="no_hp">
                </div>
                <label>Role: </label>
                <div class="form-group">
                    <select name="role" class="form-select">
                        <option value="operator">Operator</option>
                        <option value="kepala">Kepala Bagian</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

    </div>

</section>
@endsection
