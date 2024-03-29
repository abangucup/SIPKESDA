<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MabacController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\SubkriteriaController;
use App\Models\Informasi;
use Illuminate\Support\Facades\Route;


// Halaman Awal
Route::get('/', function () {
    $informasis = Informasi::all();
    return view('home', compact('informasis'));
})->name('home');

// Batasan akses tamu
Route::middleware(['guest'])->group(function () {
    // Halaman Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin']);

    // Halaman Register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister']);
});

// Harus Auth dulu
Route::group(['middleware' => 'auth'], function () {

    // Halaman Dashboard
    Route::prefix('dashboard')->group(function () {

        // Dashboard Mahasiswa
        Route::group(['middleware' => ['role:mahasiswa'], 'prefix' => 'mahasiswa'], function () {
            Route::get('/', [DashboardController::class, 'mahasiswa'])->name('dashboard_mahasiswa');
            Route::get('/beasiswa', [MahasiswaController::class, 'beasiswa'])->name('beasiswa');
            Route::post('/beasiswa', [MahasiswaController::class, 'storeBeasiswa'])->name('beasiswa.store');
            Route::put('/beasiswa', [MahasiswaController::class, 'updateBeasiswa'])->name('beasiswa.update');
            Route::delete('/besiswa', [MahasiswaController::class, 'destroyBeasiswa'])->name('beasiswa.destroy');
            Route::delete('/beasiswa', [MahasiswaController::class, 'destroyBeasiswa'])->name('beasiswa.destroy');
            Route::get('/hasil', [MahasiswaController::class, 'hasil'])->name('hasilMahasiswa');
            // Route::post('/upload-data-pribadi', [MahasiswaController::class, 'berkasPribadi'])->name('berkas.pribadi');
            // Route::post('/upload-data-beasiswa', [MahasiswaController::class, 'berkasBeasiswa'])->name('berkas.beasiswa');
        });

        // Dasboard Operator
        Route::group(['middleware' => ['role:operator'], 'prefix' => 'operator'], function () {
            Route::get('/', [DashboardController::class, 'operator'])->name('dashboard_operator');
            Route::resource('/informasi', InformasiController::class);
            Route::resource('/petugas', OperatorController::class);
            Route::get('/mahasiswa', [OperatorController::class, 'mahasiswa'])->name('operator.mahasiswa');
            Route::get('/beasiswa', [OperatorController::class, 'beasiswa'])->name('operator.beasiswa');
            Route::get('/detail-mahasiswa/{mahasiswa_id}', [OperatorController::class, 'detail'])->name('detailMhs');
            Route::get('/hasil', [MabacController::class, 'index'])->name('hasil.index');
            Route::resource('/kriteria', KriteriaController::class);
            Route::resource('/subkriteria', SubkriteriaController::class);
            // Route::put('/reupload/{id}', [OperatorController::class, 'reupload'])->name('reupload');
            // Route::put('/reupload-pribadi/{id}', [OperatorController::class, 'reuploadDataPribadi'])->name('reupload-pribadi');

            // Verifikasi Berkas
            // Route::get('/verifikasi-berkas/{mahasiswa_id}', [OperatorController::class, 'verifikasi'])->name('verifikasi-berkas');
            Route::post('/verifikasi-berkas', [OperatorController::class, 'storeVerifikasi'])->name('verifikasi');

            // downlaod berkas terkompres
            Route::get('/download-berkas/{mahasiswa_id}', [OperatorController::class, 'download'])->name('download-berkas');

            // Filter Mahasiswa Pertahun
            Route::post('filter-mahasiswa', [OperatorController::class, 'filter'])->name('filter-mahasiswa');
            // Hapus Data
            Route::delete('hapus-mahasiswa', [OperatorController::class, 'hapus'])->name('hapus-mahasiswa');
        });

        Route::put('/update/biodata/{mahasiswa_id}', [MahasiswaController::class, 'updateBiodata'])->name('update.biodata');

        // Dasboard Kepala Bagian
        Route::group(['middleware' => ['role:kepala'], 'prefix' => 'kepala'], function () {
            Route::get('/', [DashboardController::class, 'kepala'])->name('dashboard_kepala');
        });

        Route::get('/laporan/penerima', [LaporanController::class, 'penerima'])->name('laporan.penerima');
        Route::get('/laporan/penerima/cetak', [LaporanController::class, 'cetakMahasiswa'])->name('cetak.mahasiswa');
        Route::get('/laporan/beasiswa', [LaporanController::class, 'beasiswa'])->name('laporan.beasiswa');
        Route::get('/laporan/beasiswa/cetak', [LaporanController::class, 'cetakBeasiswa'])->name('cetak.beasiswa');
        Route::get('/laporan/hasil', [LaporanController::class, 'hasil'])->name('laporan.hasil');
        Route::get('/laporan/hasil/cetak', [LaporanController::class, 'cetakHasil'])->name('cetak.hasil');
    });

    Route::get('/upload/berkas', [AuthController::class, 'upload'])->name('upload');
    Route::post('/upload/berkas', [AuthController::class, 'storeBerkas']);

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
