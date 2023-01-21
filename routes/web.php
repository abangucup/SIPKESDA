<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MabacController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\SubkriteriaController;
use Illuminate\Support\Facades\Route;


// Halaman Awal 
Route::get('/', function() {
    return view('home');
})->name('home');

// Batasan akses tamu
Route::middleware(['guest'])->group(function() {
    // Halaman Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'storeLogin']);

    // Halaman Register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister']);
});

// Harus Auth dulu
Route::group(['middleware' => 'auth'], function() {

    // Halaman Dashboard
    Route::prefix('dashboard')->group(function(){

        // Dashboard Mahasiswa
        Route::group(['middleware' => ['role:mahasiswa'], 'prefix' => 'mahasiswa'],function () {
            Route::get('/', [DashboardController::class, 'mahasiswa'])->name('dashboard_mahasiswa');
            Route::get('/beasiswa', [MahasiswaController::class, 'beasiswa'])->name('beasiswa');
            Route::post('/beasiswa', [MahasiswaController::class, 'stroreBeasiswa']);
            Route::delete('/beasiswa', [MahasiswaController::class, 'destroyBeasiswa'])->name('beasiswa.destroy');
            Route::get('/hasil', [MahasiswaController::class, 'hasil'])->name('hasilMahasiswa');
        });

        // Dasboard Operator
        Route::group(['middleware' => ['role:operator'], 'prefix' => 'operator'],function () {
            Route::get('/', [DashboardController::class, 'operator'])->name('dashboard_operator');
            Route::resource('/petugas', OperatorController::class);
            Route::get('/mahasiswa', [OperatorController::class, 'mahasiswa'])->name('operator.mahasiswa');
            Route::get('/beasiswa', [OperatorController::class, 'beasiswa'])->name('operator.beasiswa');
            Route::get('/hasil', [MabacController::class, 'index'])->name('hasil.index');
            Route::resource('/kriteria', KriteriaController::class);
            Route::resource('/subkriteria', SubkriteriaController::class);
        });

        // Dasboard Kepala Bagian
        Route::group(['middleware' => ['role:kepala'], 'prefix' => 'kepala'], function () {
            Route::get('/', [DashboardController::class, 'kepala'])->name('dashboard_kepala');
        });
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});
