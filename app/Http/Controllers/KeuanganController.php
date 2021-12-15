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
        // $keuangan = Keuangan::paginate(10);
        $keuangan =Keuangan::whereDate('tanggal','>=',$dari)->whereDate('tanggal','<=',$sampai)->orderBy('tanggal','asc')->paginate(10);
        $masuk = $keuangan->sum('pemasukan');
        $keluar = $keuangan->sum('pengeluaran');
        $saldo = $masuk -$keluar;


        
        return view('keuangan.index',compact('keuangan','masuk','keluar','saldo','filterTanggal','dari','sampai'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal'=>'required',
            'catatan'=>'required'
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

    public function show($id)
    {
        //
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

    public function pemasukan(){
        $dari = '';
        $sampai = '';
        $masuk = Keuangan::where('pemasukan','!=' , 0)->orderBy('tanggal','ASC')->paginate(5);
        $jumlah = Keuangan::sum('pemasukan');
        return view('keuangan.pemasukan',compact('masuk','jumlah','dari','sampai'));
    }
    public function periodepemasukan(Request $request){
        $dari = $request->dari;
        $sampai = $request->sampai;
        $masuk =Keuangan::whereDate('tanggal','>=',$dari)->whereDate('tanggal','<=',$sampai)->where('pemasukan','!=' , 0)->orderBy('tanggal','ASC')->paginate(10);
        $jumlah = $masuk->sum('pemasukan');
        return view('keuangan.pemasukan',compact('jumlah','masuk','dari','sampai'));
    }
    public function periodepengeluaran(Request $request){
        $dari = $request->dari;
        $sampai = $request->sampai;
        $keluar =Keuangan::whereDate('tanggal','>=',$dari)->whereDate('tanggal','<=',$sampai)->where('pengeluaran','!=' , 0)->orderBy('tanggal','ASC')->paginate(10);
        $jumlah = $keluar->sum('pengeluaran');
        return view('keuangan.pengeluaran',compact('jumlah','keluar','dari','sampai'));
    }
    public function pengeluaran(){
        $dari = '';
        $sampai = '';
        $keluar = Keuangan::where('pengeluaran','!=' , 0)->orderBy('tanggal','ASC')->paginate(5);
        $jumlah = Keuangan::sum('pengeluaran');
        return view('keuangan.pengeluaran',compact('keluar','jumlah','dari','sampai'));
    }
    public function pdfMasuk(Request $request){
        $dari = $request->dari;
        $sampai = $request->sampai;
        $masuk = Keuangan::whereDate('tanggal','>=',$dari)->whereDate('tanggal','<=',$sampai)->where('pemasukan','!=' , 0)->orderBy('tanggal','ASC')->paginate(100);
        $jumlah = $masuk->sum('pemasukan');
        $pdf = PDF::loadview('keuangan.cetakpdf.cetakpdfmasuk',compact('jumlah','masuk','dari','sampai'));
        return $pdf->download($dari.'_'.$sampai.'_laporan_kas_masuk.pdf'); 
    }
    public function pdfKeluar(Request $request){
        $dari = $request->dari;
        $sampai = $request->sampai;
        $keluar = Keuangan::whereDate('tanggal','>=',$dari)->whereDate('tanggal','<=',$sampai)->where('pengeluaran','!=' , 0)->orderBy('tanggal','ASC')->paginate(100);
        $jumlah = $keluar->sum('pengeluaran');
        $pdf = PDF::loadview('keuangan.cetakpdf.cetakpdfkeluar',compact('jumlah','keluar','dari','sampai'));
        return $pdf->download($dari.'_'.$sampai.'_laporan_kas_keluar.pdf'); 
    }
    public function pdfRekap(Request $request){
        $dari = $request->dari;
        $sampai = $request->sampai;
        $total = Keuangan::whereDate('tanggal','>=',$dari)->whereDate('tanggal','<=',$sampai)->orderBy('tanggal','ASC')->paginate(100);
        $masuk = $total->sum('pemasukan');
        $keluar = $total->sum('pengeluaran');
        $saldo = $masuk -$keluar;
        $pdf = PDF::loadview('keuangan.cetakpdf.cetakpdf',compact('total','masuk','keluar','saldo','dari','sampai'))->setPaper('a4', 'landscape');
        return $pdf->download($dari.'_'.$sampai.'_laporan_rekapitulasi.pdf'); 
    }
    public function cetakRekap(){
        $rekap = Keuangan::paginate(100);
        $masuk = $rekap->sum('pemasukan');
        $keluar = $rekap->sum('pengeluaran');
        $saldo = $masuk -$keluar;
        $pdf = PDF::loadview('keuangan.cetakpdf.cetakrekap',compact('rekap','masuk','keluar','saldo'))->setPaper('a4', 'landscape');
        return $pdf->download('All_laporan_rekapitulasi.pdf'); 
    }
}
