<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validate = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $informasi  = new Informasi();
        $informasi->judul = $validate['judul'];
        $informasi->deskripsi = $validate['deskripsi'];
        $informasi->save();

        return redirect()->route('informasi.index')->with('success', 'informasi berhasil ditambahkan');
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
