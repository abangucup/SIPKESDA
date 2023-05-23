<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Operator;
use App\Models\Subkriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OperatorController extends Controller
{
    public function beasiswa()
    {
        $kriterias = Kriteria::all();
        $mahasiswas = Mahasiswa::all();
        return view('operator.penerima_beasiswa', compact('mahasiswas', 'kriterias'));
    }

    // Verifikasi Berkas
    public function storeVerifikasi(Request $request)
    {

        $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);
        $mahasiswa->update([
            'status_berkas' => $request->status_berkas
        ]);

        return redirect()->back();
    }
    // public function reupload($id)
    // {
    //     $mahasiswa = Mahasiswa::findOrFail($id);
    //     $file = public_path('storage/mahasiswa/beasiswa/' . $mahasiswa->berkas_beasiswa);

    //     if (File::exists($file)) {
    //         File::delete($file);
    //         $mahasiswa->berkas_beasiswa = null;
    //         $mahasiswa->save();
    //     }
    //     return redirect()->back();
    // }
    // public function reuploadDataPribadi($id)
    // {
    //     $mahasiswa = Mahasiswa::findOrFail($id);
    //     $file = public_path('storage/mahasiswa/pribadi/' . $mahasiswa->berkas_pribadi);

    //     if (File::exists($file)) {
    //         File::delete($file);
    //         $mahasiswa->berkas_pribadi = null;
    //         $mahasiswa->save();
    //     }
    //     return redirect()->back();
    // }

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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:operators',
            'username' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $email = Operator::where('email', $request->email)->first();
        $username = User::where('username', $request->username)->first();
        if ($username || $email) {
            if ($validator->fails()) {
                toast('Email atau Username sudah Ada', 'info');
                return back();
            }
        }

        $operator = new Operator();
        $operator->nama = $request->nama;
        $operator->email = $request->email;
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
        // $validator = Validator::make($request->all(), [
        //     'username'
        // ])
        $petugas = Operator::findOrFail($id);
        $username = Operator::where('username', $request->username)->where('id', '!=', $petugas->id)->first();
        if ($username) {
            toast('Username Sudah Ada', 'info');
            return back();
        }
        $petugas->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
        ]);

        $user = User::where('operator_id', $petugas->id)->first();
        $user->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        toast('Berhasil Update Data', 'success');
        return back();
    }

    public function destroy($id)
    {
        Operator::destroy($id);
        return redirect()->route('petugas.index');
    }

    public function download($mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::findOrFail($mahasiswa_id);
        $zipFileName = 'storage/berkas/' . $mahasiswa->nama . '.zip';
        $zip = new ZipArchive();
        if ($zip->open(public_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            // $surat_permohonan = public_path('storage/berkas/qMzCLzrZoiKq2ARHXiu72tKp77DVTN15JSS2sykS.pdf');
            // $file2 = public_path('storage/berkas/F3A2AFxZcS9LYFJR3TgVxBDGUVS9ckgth2IFHx5s.pdf');
            $surat_permohonan = $mahasiswa->berkas->surat_permohonan;
            $surat_keterangan_selesai_proposal = $mahasiswa->berkas->surat_keterangan_selesai_proposal;
            $rekening_aktif = $mahasiswa->berkas->rekening_aktif;
            $ktp = $mahasiswa->berkas->ktp;
            $kk = $mahasiswa->berkas->kk;
            $ktm = $mahasiswa->berkas->ktm;
            $transkip_nilai = $mahasiswa->berkas->transkip_nilai;
            $pernyataan_asn = $mahasiswa->berkas->pernyataan_asn;
            $surat_aktif_kuliah = $mahasiswa->berkas->surat_aktif_kuliah;
            $surat_keterangan_bebas_beasiswa = $mahasiswa->berkas->surat_keterangan_bebas_beasiswa;

            $content1 = file_get_contents($surat_permohonan);
            $content2 = file_get_contents($surat_keterangan_selesai_proposal);
            $content3 = file_get_contents($rekening_aktif);
            $content4 = file_get_contents($ktp);
            $content5 = file_get_contents($kk);
            $content6 = file_get_contents($ktm);
            $content7 = file_get_contents($transkip_nilai);
            $content8 = file_get_contents($pernyataan_asn);
            $content9 = file_get_contents($surat_aktif_kuliah);
            $content10 = file_get_contents($surat_keterangan_bebas_beasiswa);

            $zip->addFromString('surat_permohonan.pdf', $content1);
            $zip->addFromString('surat_keterangan_selesai_proposap.pdf', $content2);
            $zip->addFromString('rekening_aktif.pdf', $content3);
            $zip->addFromString('ktp.pdf', $content4);
            $zip->addFromString('kk.pdf', $content5);
            $zip->addFromString('ktm.pdf', $content6);
            $zip->addFromString('transkip_nilai.pdf', $content7);
            $zip->addFromString('pernyataan_asn.pdf', $content8);
            $zip->addFromString('surat_aktif_kuliah.pdf', $content9);
            $zip->addFromString('surat_keterangan_bebas_beasiswa.pdf', $content10);

            $zip->close();

            return response()->download(public_path($zipFileName))->deleteFileAfterSend();
        }

        return redirect()->back()->with('error', 'Failed to create compressed file.');
    }

    // Filter Data Pertahun
    public function filter(Request $request)
    {
        if ($request->tahun == 'all') {
            // $mahasiswa = Mahasiswa::all();
            return redirect()->route('operator.mahasiswa');
        }

        $mahasiswas = Mahasiswa::whereYear('created_at', $request->tahun)->get();

        return view('operator.list_mahasiswa', compact('mahasiswas'));
    }

    public function hapus()
    {
        $tahun = request()->input('tahun');
        Mahasiswa::whereYear('created_at', $tahun)->delete();

        return redirect()->route('operator.mahasiswa')->with('success', 'Data mahasiswa yang difilter berhasil dihapus.');
    }
}
