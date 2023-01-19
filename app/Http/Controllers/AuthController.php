<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        if(Auth::attempt($validasi)){
            $user = auth()->user()->role;
            if ($user == 'operator') {
                return redirect()->route('dashboard_operator');
            } elseif ($user == 'mahasiswa') {
                return redirect()->route('dashboard_mahasiswa');
            }else {
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
        $this->validate($request, [
            'nama' => 'required',
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

        $username = Mahasiswa::where('username', $request->username)->first();
        if($username) {
            return back();
        }

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
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
        $user->username = $mahasiswa->username;
        $user->password = Hash::make($request->password);
        $user->role = 'mahasiswa';
        $user->save();

        return to_route('login');
    }
}
