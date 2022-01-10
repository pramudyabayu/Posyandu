<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\Pengukuran;
use App\Models\Imunisasi;
use App\Models\Kader;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $balita = Balita::latest()->count();
        $pengukuran = Pengukuran::latest()->count();
        $imunisasi = Imunisasi::latest()->count();
        $kader = Kader::latest()->count();
        
        return view('dashboard.index',['balita' => $balita, 'pengukuran' => $pengukuran, 'imunisasi' => $imunisasi, 'kader' => $kader]); 
    }
}
