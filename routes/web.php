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
Route::get('/balita/{id}/edit', [BalitaController::class, 'edit']);
Route::post('/balita/update', [BalitaController::class, 'update']);
Route::get('/balita/{balita}/delete', [BalitaController::class, 'destroy']);
Route::get('/balita/search', [BalitaController::class, 'search'])->name('search');
Route::get('/balita/exportpdf', [BalitaController::class, 'exportpdf'])->name('exportpdf');
Route::get('/balita/export-excel', [BalitaController::class, 'exportIntoExcel']);
Route::get('/balita/export-csv', [BalitaController::class, 'exportIntoCSV']);


Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::post('/jadwal', [JadwalController::class, 'store']);
Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit']);
Route::post('/jadwal/update', [JadwalController::class, 'update']);
Route::get('/jadwal/{jadwal}/delete', [JadwalController::class, 'destroy']);

Route::get('/kader', [KaderController::class, 'index'])->name('kader.index');
Route::post('/kader', [KaderController::class, 'store']);
Route::get('/kader/{id}/edit', [KaderController::class, 'edit']);
Route::post('/kader/update', [KaderController::class, 'update']);
Route::get('/kader/{kader}/delete', [KaderController::class, 'destroy']);
Route::get('/kader/exportpdf', [KaderController::class, 'exportpdf'])->name('exportpdf');
Route::get('/kader/export-excel', [KaderController::class, 'exportIntoExcel']);
Route::get('/kader/export-csv', [KaderController::class, 'exportIntoCSV']);

Route::get('/pengukuran', [PengukuranController::class, 'index'])->name('pengukuran.index');
Route::post('/pengukuran', [PengukuranController::class, 'store']);
Route::get('/pengukuran/{id}/edit', [PengukuranController::class, 'edit']);
Route::post('/pengukuran/update', [PengukuranController::class, 'update']);
Route::get('/pengukuran/{pengukuran}/delete', [PengukuranController::class, 'destroy']);
// Route::get('/pengukuran/search', [PengukuranController::class, 'search'])->name('search');
Route::get('/pengukuran/exportpdf', [PengukuranController::class, 'exportpdf'])->name('exportpdf');
Route::get('/pengukuran/export-excel', [PengukuranController::class, 'exportIntoExcel']);
Route::get('/pengukuran/export-csv', [PengukuranController::class, 'exportIntoCSV']);


Route::get('/imunisasi', [ImunisasiController::class, 'index'])->name('imunisasi.index');
Route::post('/imunisasi', [ImunisasiController::class, 'store']);
Route::get('/imunisasi/{id}/edit', [ImunisasiController::class, 'edit']);
Route::post('/imunisasi/update', [ImunisasiController::class, 'update']);
Route::get('/imunisasi/{imunisasi}/delete', [ImunisasiController::class, 'destroy']);
Route::get('/imunisasi/exportpdf', [ImunisasiController::class, 'exportpdf'])->name('exportpdf');
Route::get('/imunisasi/export-excel', [ImunisasiController::class, 'exportIntoExcel']);
Route::get('/imunisasi/export-csv', [ImunisasiController::class, 'exportIntoCSV']);


Route::get('/keuangan',[KeuanganController::class,'keuangan']);
Route::get('/pemasukan',[KeuanganController::class,'pemasukan']);
Route::get('/pengeluaran',[KeuanganController::class,'pengeluaran']);



