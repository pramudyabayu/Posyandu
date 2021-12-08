<?php

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

Route::get('/pengukuran', function () {
    return view('pengukuran.index');
});

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::POST('jadwalcreate','JadwalController@jadwalcreate')->name('jadwal.create');

