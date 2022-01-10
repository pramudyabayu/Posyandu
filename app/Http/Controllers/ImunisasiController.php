<?php
 
namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Imunisasi;
use App\Exports\ImunisasiExport;
use Excel;
use PDF;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    public function index()
    {
        $imunisasi = Imunisasi::orderBy('created_at','ASC')->simplePaginate(5);
        $balita = Balita::all();
        return view('imunisasi.index', compact('imunisasi', 'balita'));
    } 

    public function store(Request $request)
    {
        $request->validate([
            'tgl_imunisasi' => 'required',
            'balita_id'=>'required',
            'jenis_imunisasi'=>'required',
        ]);

        Imunisasi::create($request->all());
      return redirect()->route('imunisasi.index')->with('toast_success', 'Data Imunisasi Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        //
    }
 
    public function edit($id)
    {
        $balita = Balita::all();
        $imunisasi = Imunisasi::where('id', $id)->first(); 
      //mengambil value input select Nama Balita
        $balita_id = $imunisasi->balita_id;
        $output_nama_balita = '';
        foreach ($balita as $key => $value) {
            $output_nama_balita .= '
                 <option ' . (old("balita_id", $balita_id) == $value->id ? "selected" : "") . ' value="' . $value->id . '">' . $value->nama_balita . '</option>
            ';

        }
        //mengambil value input select Jenis Imunisasi
        $jenis_imunisasi = $imunisasi->jenis_imunisasi;
        $nilai_jenis_imunisasi = [
            '0-7 Hari (HB 0)',
            '1 Bulan (BCG, Polio 1)',
            '2 Bulan (DPT-HB-Hib 1, Polio 2)',
            '3 Bulan (DPT-HB-Hib 2, Polio 3)',
            '4 Bulan (DPT-HB-Hib 3, Polio 4, IPV)',
            '9 Bulan (Campak)',
            '18 Bulan (DPT-HB-Hib)',
            '24 Bulan (Campak)'
        ];
        $output_jenis_imunisasi = '';
        foreach ($nilai_jenis_imunisasi as $key => $value) {
            $output_jenis_imunisasi .= '
                <option ' . (old("jenis_imunisasi", $jenis_imunisasi) == $value ? "selected" : "") . ' value="' . $value . '">' . $value . '</option>
                ';
        }

        return response()->json([
            'data' => $imunisasi,
            'output_nama_balita' => $output_nama_balita,
            'output_jenis_imunisasi' => $output_jenis_imunisasi,
        ]);

    }

    public function update(Request $request)
    { 
        $validasi = $request->validate([
            'tgl_imunisasi' => 'required',
            'balita_id'=>'required',
            'jenis_imunisasi'=>'required'
        ]);
        Imunisasi::where('id', $request->id)
        ->update($validasi);
        return redirect()->route('imunisasi.index')->with('toast_success', 'Data Imunisasi Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        Imunisasi::destroy($id);
        return redirect('/imunisasi')->with('success','Data Imunisasi berhasil dihapus!');
    }

    public function exportpdf()
    {
        $imunisasi = Imunisasi::all();

        view()->share('imunisasi', $imunisasi);
        $pdf = PDF::loadview('imunisasi.imunisasi-pdf')->setPaper('a4','landscape');
        return $pdf->stream('imunisasi.pdf');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ImunisasiExport, 'imunisasilist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new ImunisasiExport, 'imunisasilist.csv');
    }
}