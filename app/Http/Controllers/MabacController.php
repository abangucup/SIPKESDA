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


        $min = [];
        $max = [];
        foreach ($kriterias as $kriteria) {
            $min_nilai = DB::table('subkriterias')
                ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
                ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
                ->where('kriterias.id', $kriteria->id)
                ->min('subkriterias.nilai');
            // $max_nilai = DB::table('subkriterias')
            //     ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
            //     ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
            //     ->where('kriterias.kode', $i)
            //     ->max('subkriterias.nilai');
            $max_nilai = DB::table('subkriterias')
                ->join('mahasiswa_subkriteria', 'subkriterias.id', '=', 'mahasiswa_subkriteria.subkriteria_id')
                ->join('kriterias', 'subkriterias.kriteria_id', '=', 'kriterias.id')
                ->where('kriterias.id', $kriteria->id)
                ->max('subkriterias.nilai');
            $min[$kriteria->kriteria] = $min_nilai;
            $max[$kriteria->kriteria] = $max_nilai;
        }
        // $mahasiswa = Mahasiswa::where('id', 1)->first();

        // dd($min);
        // dd('mati');


        // $normalisasi_matriks = array();

        // foreach ($mahasiswas as $mhs) {
        //     echo $mhs;
        //     dd('mati');
        //     $data_normalisasi = array();
        //     foreach ($mhs->subkriteria as $subk) {
        //         $kriteria = Kriteria::find($subk->kriteria_id);
        //         if ($kriteria->jenis == "benefit") {
        //             $normalisasi = ($subk->nilai - (float)$min) / ((float)$max - (float)$min);
        //         } else {
        //             $normalisasi = ($subk->nilai - (float)$max) / ((float)$max- (float)$min);
        //         }
        //         $data_normalisasi[$kriteria->kode] = $normalisasi;
        //     }
        //     $normalisasi_matriks[$mhs->id] = $data_normalisasi;
        // }
        // echo $min_nilai;
        // dd('mati');

        return view('operator.hitung.index', compact('mahasiswas', 'kriterias', 'min', 'max'));
    }
}
