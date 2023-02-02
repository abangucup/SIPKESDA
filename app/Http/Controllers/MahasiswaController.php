<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Perhitungan;
use App\Models\Subkriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function berkasPribadi(Request $request)
    {
        $this->validate($request, [
            'berkas_pribadi' => 'required|mimes:zip,rar',
        ]);

        //upload berkas pribadi
        $filepribadi = $request->file('berkas_pribadi');
        $namepribadi = time() . '.' . $filepribadi->getClientOriginalExtension();
        $filepribadi->storeAs('mahasiswa/pribadi', $namepribadi, 'public');

        if($request->berkas_beasiswa != null) {

            // upload berkas beasiswa
            $filebeasiswa = $request->file('berkas_beasiswa');
            $namebeasiswa = time() . '.' . $filebeasiswa->getClientOriginalExtension();
            $filebeasiswa->storeAs('mahasiswa/beasiswa', $namebeasiswa, 'public');
            
            Mahasiswa::where('id', auth()->user()->mahasiswa_id)->update([
                'berkas_pribadi' => $namepribadi,
                'berkas_beasiswa' => $namebeasiswa,
            ]);
        }
        Mahasiswa::where('id', auth()->user()->mahasiswa_id)->update([
            'berkas_pribadi' => $namepribadi,
        ]);
        return redirect()->back();
    }

    public function berkasBeasiswa(Request $request)
    {
        $this->validate($request, [
            'berkas_beasiswa' => 'required|mimes:zip,rar',
        ]);

        $file = $request->file('berkas_beasiswa');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('mahasiswa/beasiswa', $filename, 'public');
        Mahasiswa::where('id', auth()->user()->mahasiswa_id)->update([
            'berkas_beasiswa' => $filename,
        ]);

        return redirect()->back();
    }

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
        $mahasiswa->subkriteria()->detach($request->subkriteria_id);
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
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.hasil', compact('mahasiswas', 'kriterias'));
    }

}
