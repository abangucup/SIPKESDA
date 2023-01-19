<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $subkriterias = Subkriteria::all();

        return view('operator.kriteria.index', compact('kriterias', 'subkriterias'));
    }
}
