<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use RealRashid\SweetAlert\Facades\Alert;
use Alert;
use App\Models\BerkasPribadi;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $validasi = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validasi)) {
            $user = auth()->user()->role;
            if ($user == 'operator') {
                return redirect()->route('dashboard_operator');
            } elseif ($user == 'mahasiswa') {
                return redirect()->route('dashboard_mahasiswa');
            } else {
                return redirect()->route('dashboard_kepala');
            }
        }

        return back()->with('status', 'Username Atau Password Salah');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:mahasiswas',
            'nik' => 'required|unique:mahasiswas',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kampus' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'username' => 'required|unique:mahasiswas',
            'password' => 'required',
        ]);

        $email = Mahasiswa::where('email', $request->email)->first();
        $nik = Mahasiswa::where('nik', $request->nik)->first();
        $username = Mahasiswa::where('username', $request->username)->first();
        if ($username || $nik || $email) {
            if ($validator->fails()) {
                toast('Email atau Username atau NIK sudah Ada', 'info');
                return back();
            }
        }

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->email = $request->email;
        $mahasiswa->nik = $request->nik;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
        $mahasiswa->jk = $request->jk;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->kampus = $request->kampus;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->username = $request->username;
        $mahasiswa->password = $request->password;
        $mahasiswa->save();

        $user = new User();
        $user->mahasiswa_id = $mahasiswa->id;
        $user->username = $mahasiswa->username;
        $user->password = Hash::make($request->password);
        $user->role = 'mahasiswa';
        $user->save();

        Auth::login($user);

        // return redirect()->intended('dashboard_mahasiswa');
        // return redirect()->route('dashboard_mahasiswa');
        return redirect()->route('upload');
    }

    public function upload()
    {
        return view('auth.upload_berkas');
    }

    public function storeBerkas(Request $request)
    {
        $id_mhs = auth()->user()->mahasiswa_id;

        $this->validate($request, [
            'surat_permohonan' => 'required|file|mimes:pdf',
            'surat_keterangan_selesai_proposal' => 'required|file|mimes:pdf',
            'rekening_aktif' => 'required|file|mimes:pdf',
            'ktp' => 'required|file|mimes:pdf',
            'kk' => 'required|file|mimes:pdf',
            'ktm' => 'required|file|mimes:pdf',
            'transkip_nilai' => 'required|file|mimes:pdf',
            'pernyataan_asn' => 'required|file|mimes:pdf',
            'surat_aktif_kuliah' => 'required|file|mimes:pdf',
            'surat_keterangan_bebas_beasiswa' => 'required|file|mimes:pdf',
        ]);

        // SIMPAN FILE
        $surat_permohonan = $request->file('surat_permohonan')->store('public/berkas');
        $surat_keterangan_selesai_proposal = $request->file('surat_keterangan_selesai_proposal')->store('public/berkas');
        $rekening_aktif = $request->file('rekening_aktif')->store('public/berkas');
        $ktp = $request->file('ktp')->store('public/berkas');
        $kk = $request->file('kk')->store('public/berkas');
        $ktm = $request->file('ktm')->store('public/berkas');
        $transkip_nilai = $request->file('transkip_nilai')->store('public/berkas');
        $pernyataan_asn = $request->file('pernyataan_asn')->store('public/berkas');
        $surat_aktif_kuliah = $request->file('surat_aktif_kuliah')->store('public/berkas');
        $surat_keterangan_bebas_beasiswa = $request->file('surat_keterangan_bebas_beasiswa')->store('public/berkas');

        BerkasPribadi::create([
            'mahasiswa_id' => $id_mhs,
            'surat_permohonan' => asset(Storage::url($surat_permohonan)),
            'surat_keterangan_selesai_proposal' =>  asset(Storage::url($surat_keterangan_selesai_proposal)),
            'rekening_aktif' => asset(Storage::url($rekening_aktif)),
            'ktp' => asset(Storage::url($ktp)),
            'kk' => asset(Storage::url($kk)),
            'ktm' => asset(Storage::url($ktm)),
            'transkip_nilai' => asset(Storage::url($transkip_nilai)),
            'pernyataan_asn' => asset(Storage::url($pernyataan_asn)),
            'surat_aktif_kuliah' => asset(Storage::url($surat_aktif_kuliah)),
            'surat_keterangan_bebas_beasiswa' => asset(Storage::url($surat_keterangan_bebas_beasiswa)),
        ]);

        return redirect()->route('dashboard_mahasiswa');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
