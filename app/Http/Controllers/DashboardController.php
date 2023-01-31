<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function mahasiswa()
    {
        $cek_berkas = Mahasiswa::where('id', auth()->user()->mahasiswa_id)->first();
        // dd($cek_berkas);
        $kriterias = Kriteria::all();
        $subkriterias = Subkriteria::all();
        $mahasiswas = Mahasiswa::all()->sortByDesc('created_at');
        return view('mahasiswa.dashboard', compact('mahasiswas', 'kriterias', 'subkriterias', 'cek_berkas'));
    }

    public function operator()
    {
        $kriterias = Kriteria::all();
        $subkriterias = Subkriteria::all();
        $mahasiswas = Mahasiswa::all()->sortByDesc('created_at');
        return view('operator.dashboard', compact('mahasiswas', 'kriterias', 'subkriterias'));
    }

    public function kepala()
    {
        $kriterias = Kriteria::all();
        $subkriterias = Subkriteria::all();
        $mahasiswas = Mahasiswa::all()->sortByDesc('created_at');
        return view('kepala.dashboard', compact('mahasiswas', 'kriterias', 'subkriterias'));
    }

}
