<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function list_mahasiswa()
    {
        $mahasiswas = Mahasiswa::all();
        return view('operator.list_mahasiswa', compact('mahasiswas'));
    }

    public function index()
    {

    }

    public function create()
    {
        
    }
}
