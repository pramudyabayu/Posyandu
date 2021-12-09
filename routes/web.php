<?php

<<<<<<< HEAD
use App\Http\Controllers\JadwalController;
=======
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\JadwalController;

>>>>>>> 21962ee215f340f84c04ed1522f0eed04c616b60
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

<<<<<<< HEAD
=======
// Route::get('/balita', function () {
//     return view('balita.index');
// });

>>>>>>> 21962ee215f340f84c04ed1522f0eed04c616b60
Route::get('/pengukuran', function () {
    return view('pengukuran.index');
});

<<<<<<< HEAD
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::POST('jadwalcreate','JadwalController@jadwalcreate')->name('jadwal.create');
=======
Route::get('/balita', [BalitaController::class, 'index'])->name('balita.index');
Route::get('/balita', [BalitaController::class, 'index'])->name('balita.create');

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
>>>>>>> 21962ee215f340f84c04ed1522f0eed04c616b60

