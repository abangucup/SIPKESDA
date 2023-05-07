<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informasis = Informasi::all();
        return view('operator.informasi.index', compact('informasis'));
    }

    public function create()
    {
        return view('operator.informasi.create');
    }

    public function store(Request $request)
    {
        // return view('operator.informasi.')
    }

    public function edit()
    {
        return view('operator.informasi.edit');
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }
}
