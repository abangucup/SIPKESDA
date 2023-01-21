<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MabacController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();
        return view('operator.hitung.index', compact('mahasiswas', 'kriterias'));
    }
}
