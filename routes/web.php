<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


// Batasan akses tamu
Route::middleware(['guest'])->group(function() {

    // Halaman Awal 
    Route::get('/', function() {
        return view('welcome');
    });

    // Halaman Login
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'storeLogin']);

    // Halaman Register
    Route::get('/register', [MahasiswaController::class, 'create']);
    Route::post('/register', [MahasiswaController::class, 'store']);
});
