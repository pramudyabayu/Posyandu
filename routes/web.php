<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PengukuranController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
});


Route::get('/balita', [BalitaController::class, 'index'])->name('balita.index');

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

Route::get('/pengukuran', [PengukuranController::class, 'index'])->name('pengukuran.index');

Route::get('/imunisasi', [ImunisasiController::class, 'index'])->name('imunisasi.index');

Route::get('/kader', [KaderController::class, 'index'])->name('kader.index');



