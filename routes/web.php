<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\JadwalController;

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

// Route::get('/balita', function () {
//     return view('balita.index');
// });

Route::get('/pengukuran', function () {
    return view('pengukuran.index');
});

Route::get('/balita', [BalitaController::class, 'index'])->name('balita.index');
Route::get('/balita', [BalitaController::class, 'index'])->name('balita.create');

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

