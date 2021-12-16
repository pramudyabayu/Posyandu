<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        //menyiapkan data untuk chart
        /* variabel dari dan sampai diisi dengan value kosong */
        $dari = '';
        $sampai = '';
        /* Variabel keuangan diisi dengan pemanggilan atau Query data dari Database */
        /* Paginate berfungsi untuk membatasi data yang ditampilkan */
        $keuangan = Keuangan::orderBy('created_at','ASC')->paginate(10);
        /* variabel $masuk diisi dengan sum dari kolom pemasukan atau menghitung jumlah total pada kolom pemasukan */
        $masuk = $keuangan->sum('pemasukan');
        /* variabel $keluar diisi dengan sum dari kolom pengeluaran atau menghitung jumlah total pada kolom pengeluaran */
        $keluar = $keuangan->sum('pengeluaran');
          /* variabel saldo diisi dengan operasi pengurangan dari pemasukan dikurangi pengeluaran sehingga dihasilkan saldo  */
        $saldo = $masuk -$keluar;
         /* Return view berungsi untuk mengembalikan tampilan ke folder keuangan kemudian file index 
            compact berfungsi untuk membawa data dari Kontroller menuju ke tampilan
         */
        return view('keuangan.index',compact('keuangan','masuk','keluar','saldo','dari','sampai'));
    }
    
    public function periode(Request $request){
        $filterTanggal = Keuangan::all();
        $dari = $request->dari;
        $sampai = $request->sampai;
        $keuangan =Keuangan::whereDate('tanggal','>=',$dari)->whereDate('tanggal','<=',$sampai)->orderBy('tanggal','asc')->paginate(10);
        $masuk = $keuangan->sum('pemasukan');
        $keluar = $keuangan->sum('pengeluaran');
        $saldo = $masuk -$keluar;

        return view('keuangan.laporan',compact('keuangan','masuk','keluar','saldo','filterTanggal','dari','sampai'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tanggal'=>'required',
            'catatan'=>'required',
        ]);
        if($request->pemasukan == !null){
            Keuangan::create([
                'tanggal'=>$request->tanggal,
                'pemasukan'=>$request->pemasukan,
                'pengeluaran'=>0,
                'catatan'=>$request->catatan
            ]);
            return redirect('/pemasukan')->with('status','Data Kas Masuk berhasil ditambahkan!');
        }
        else{
            Keuangan::create([
                'tanggal'=>$request->tanggal,
                'pemasukan'=>0,
                'pengeluaran'=>$request->pengeluaran,
                'catatan'=>$request->catatan
                
                ]);
                return redirect('/pengeluaran')->with('status','Data Kas Keluar berhasil ditambahkan!');
        }
    }

    public function edit(Keuangan $keuangan)
    {
        return view('keuangan.edit',compact('keuangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'catatan'=>'required',
        ]);
        
        Keuangan::where('id',$id)
                ->update([
                    'pemasukan'=>$request->pemasukan,
                    'tanggal'=>$request->tanggal,
                    'pengeluaran'=>$request->pengeluaran,
                    'catatan'=>$request->catatan,
                ]);
        return redirect('/keuangan')->with('status','Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        Keuangan::destroy($id);
        return redirect('/keuangan')->with('status','Data berhasil dihapus!');
    }