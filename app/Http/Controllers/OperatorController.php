<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Operator;
use App\Models\Subkriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OperatorController extends Controller
{
    public function beasiswa()
    {
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();
        return view('operator.penerima_beasiswa', compact('mahasiswas', 'kriterias'));
    }

    public function reupload($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $file = public_path('storage/mahasiswa/beasiswa/'.$mahasiswa->berkas_beasiswa);
        
        if (File::exists($file)) {
            File::delete($file);
            $mahasiswa->berkas_beasiswa = null;
            $mahasiswa->save();
        }
        return redirect()->back();
    }
    public function reuploadDataPribadi($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $file = public_path('storage/mahasiswa/pribadi/'.$mahasiswa->berkas_pribadi);
        
        if (File::exists($file)) {
            File::delete($file);
            $mahasiswa->berkas_pribadi = null;
            $mahasiswa->save();
        }
        return redirect()->back();
    }

    public function detail($mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::where('id', $mahasiswa_id)->with('subkriteria')->first();
        $subkriterias = $mahasiswa->subkriteria;
        return view('operator.detail_penerima', compact('mahasiswa', 'subkriterias'));
    }

    public function mahasiswa()
    {
        $mahasiswas = Mahasiswa::all();
        return view('operator.list_mahasiswa', compact('mahasiswas'));
    }

    public function index()
    {
        $operators = Operator::all();
        return view('operator.index', compact('operators'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required|unique:operators',
            'password' => 'required',
            'role' => 'required'
        ]);

        $username = Operator::where('username', $request->username)->first();
        if ($username) {
            return back();
        }

        $operator = new Operator();
        $operator->nama = $request->nama;
        $operator->username = $request->username;
        $operator->password = Hash::make($request->password);
        $operator->role = $request->role;
        $operator->no_hp = $request->no_hp;
        $operator->save();

        $user = new User();
        $user->operator_id = $operator->id;
        $user->username = $operator->username;
        $user->password = Hash::make($request->password);
        $user->role = $operator->role;
        $user->save();

        return back();
    }

    public function update(Request $request, $id)
    {
        $petugas = Operator::findOrFail($id);
        $petugas->update($request->all());

        $cek = User::all()->find('operator_id', $petugas->id);
        if($cek == $petugas->id){
            User::where('operator_id', $petugas->id)->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        }

        return back();
    }

    public function destroy($id)
    {
        Operator::destroy($id);
        return redirect()->route('petugas.index');
    }

}
