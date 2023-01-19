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
        $kriterias = Kriteria::all();
        $subkriterias = Subkriteria::all();
        $mahasiswas = Mahasiswa::all()->sortByDesc('created_at');
        return view('mahasiswa.dashboard', compact('mahasiswas', 'kriterias', 'subkriterias'));
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
