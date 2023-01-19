<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function mahasiswa() 
    {
        echo "HALAMAN MAHASISWA";
    }

    public function operator()
    {
        echo "HALAMAN OPERATOR";
    }

    public function kepala()
    {
        echo "HALAMAN KEPALA";
    }

}

