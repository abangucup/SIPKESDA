<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function mahasiswa()
    {
        return view('mahasiswa.dashboard');
    }

    public function operator()
    {
        return view('operator.dashboard');
    }

    public function kepala()
    {
        return view('kepala.dashboard');
    }
}
