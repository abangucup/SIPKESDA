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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    // UPDATE PROFILE ATAU BIODATA MAHASISWA
    public function updateBiodata(Request $request, $mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::where('id', $mahasiswa_id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required|unique:mahasiswas',
            'email' => 'required|unique:mahasiswas',
            'username' => 'required|unique:mahasiswas',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kampus' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
        ]);

        $username = Mahasiswa::where('username', $request->username)->where('id', '!=', $mahasiswa_id)->first();
        $nik = Mahasiswa::where('nik', $request->nik)->where('id', '!=', $mahasiswa_id)->first();
        $email = Mahasiswa::where('email', $request->email)->where('id', '!=', $mahasiswa_id)->first();

        if ($nik || $email || $username) {
            if ($validator->fails()) {
                toast('Email atau Username atau NIK sudah ada', 'info');
                return back();
            }
        }

        if ($request->password != null) {
            $mahasiswa->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'kampus' => $request->kampus,
                'jurusan' => $request->jurusan,
                'no_hp' => $request->no_hp,
            ]);

            $user = User::where('mahasiswa_id', $mahasiswa_id)->first();
            $user->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $mahasiswa->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'username' => $request->username,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'kampus' => $request->kampus,
                'jurusan' => $request->jurusan,
                'no_hp' => $request->no_hp,
            ]);
        }

        toast('Berhasil Update Biodata', 'success');
        return redirect()->back();
    }

    public function berkasPribadi(Request $request)
    {
        // dd($request->all());
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
