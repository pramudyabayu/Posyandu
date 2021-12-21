<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\PengukuranController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');

Route::get('/balita', [BalitaController::class, 'index'])->name('balita.index');
Route::post('/balita', [BalitaController::class, 'store']);


Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::post('/jadwal', [JadwalController::class, 'store']);

Route::get('/kader', [KaderController::class, 'index'])->name('kader.index');
Route::post('/kader', [KaderController::class, 'store']);

Route::get('/pengukuran', [PengukuranController::class, 'index'])->name('pengukuran.index');
Route::post('/pengukuran', [PengukuranController::class, 'store']);

Route::get('/imunisasi', [ImunisasiController::class, 'index'])->name('imunisasi.index');
Route::post('/imunisasi', [ImunisasiController::class, 'store']);


Route::get('/keuangan',[KeuanganController::class,'keuangan']);
Route::get('/pemasukan',[KeuanganController::class,'pemasukan']);
Route::get('/pengeluaran',[KeuanganController::class,'pengeluaran']);

Route::get('/balita/{balita}/delete', [BalitaController::class, 'destroy']);
Route::get('/imunisasi/{imunisasi}/delete', [ImunisasiController::class, 'destroy']);
Route::get('/jadwal/{jadwal}/delete', [JadwalController::class, 'destroy']);
Route::get('/kader/{kader}/delete', [KaderController::class, 'destroy']);
Route::get('/pengukuran/{pengukuran}/delete', [PengukuranController::class, 'destroy']);
