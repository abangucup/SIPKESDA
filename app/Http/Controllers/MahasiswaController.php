<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beasiswa()
    {
        $kriterias = Kriteria::all();
        $mahasiswa = Mahasiswa::where('username', auth()->user()->username)->first();
        return view('mahasiswa.kriteria_beasiswa', compact('mahasiswa', 'kriterias'));
    }

    public function stroreBeasiswa(Request $request)
    {

    }
    // fungsi untuk melihat hasil dari perhitungan
    public function hasil()
    {
        return view('mahasiswa.hasil');
    }
    
    public function index()
    {

    }

    public function create()
    {
        
    }

}
