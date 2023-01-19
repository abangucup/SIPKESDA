<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


// Batasan akses tamu
Route::middleware(['guest'])->group(function() {

    // Halaman Awal 
    Route::get('/', function() {
        return view('home');
    })->name('home');

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
        Route::group(['middleware' => ['role:mahasiswa'], 'prefix' => '<mahasiswa></mahasiswa>'],function () {
            Route::get('/', [DashboardController::class, 'mahasiswa'])->name('dashboard_mahasiswa');
        });

        // Dasboard Operator
        Route::group(['middleware' => ['role:operator'], 'prefix' => 'operator'],function () {
            Route::get('/', [DashboardController::class, 'operator'])->name('dashboard_operator');
        });

        // Dasboard Kepala Bagian
        Route::group(['middleware' => ['role:kepala'], 'prefix' => 'kepala'], function () {
            Route::get('/', [DashboardController::class, 'kepala'])->name('dashboard_kepala');
        });
    });

});
