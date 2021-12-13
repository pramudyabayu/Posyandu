<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\imunisasiController;
use App\Http\Controllers\pengukuranController;
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
<<<<<<< HEAD
Route::post('/balita', [BalitaController::class, 'store']);
=======
>>>>>>> cc6ff5c3c67eae3260f9be4271d54a105ade2269
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/kader', [KaderController::class, 'index'])->name('kader.index');
Route::get('/pengukuran', [PengukuranController::class, 'index'])->name('pengukuran.index');
Route::get('/imunisasi', [ImunisasiController::class, 'index'])->name('imunisasi.index');

