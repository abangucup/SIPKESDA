<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MabacController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();


        $min_ben = [];
        $min_co = [];
        $max_ben = [];
        $max_co = [];
        foreach ($kriterias as $kriteria) {
            $min_benefit = DB::table('subkriterias')
                ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
                ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
                ->where('kriterias.id', $kriteria->id)
                ->where('kriterias.jenis', 'benefit')
                ->min('subkriterias.nilai');
            $min_cost = DB::table('subkriterias')
                ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
                ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
                ->where('kriterias.id', $kriteria->id)
                ->where('kriterias.jenis', 'cost')
                ->min('subkriterias.nilai');
            $max_benefit = DB::table('subkriterias')
                ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
                ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
                ->where('kriterias.id', $kriteria->id)
                ->where('kriterias.jenis', 'benefit')
                ->max('subkriterias.nilai');
            $max_cost = DB::table('subkriterias')
                ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
                ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
                ->where('kriterias.id', $kriteria->id)
                ->where('kriterias.jenis', 'cost')
                ->max('subkriterias.nilai');

            $min_ben[$kriteria->kriteria] = $min_benefit;
            $min_co[$kriteria->kriteria] = $min_cost;
            $max_ben[$kriteria->kriteria] = $max_benefit;
            $max_co[$kriteria->kriteria] = $max_cost;
        }

        return view('operator.hitung.index', compact('mahasiswas', 'kriterias', 'min_ben', 'min_co', 'max_ben', 'max_co'));
    }
}
