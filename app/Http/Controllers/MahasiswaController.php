<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beasiswa()
    {
        $kriterias = Kriteria::all();
        $mahasiswa = Mahasiswa::where('username', auth()->user()->username)->first();
        return view('mahasiswa.kriteria_beasiswa', compact('mahasiswa', 'kriterias'));
    }

    public function storeBeasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::where('id', auth()->user()->mahasiswa_id)->first();
        $mahasiswa->subkriteria()->attach($request->subkriteria_id);
        return redirect()->back();
    }

    public function updateBeasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::find(auth()->user()->mahasiswa_id);
        $mahasiswa->subkriteria()->sync($request->subkriteria_id);
        return redirect()->back();
    }

    public function destroyBeasiswa(Request $request)
    {
        $mahasiswa = Mahasiswa::find(auth()->user()->mahasiswa_id);
        $mahasiswa->subkriteria()->detach($request->subkriteria_id);
        return redirect()->back();
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
