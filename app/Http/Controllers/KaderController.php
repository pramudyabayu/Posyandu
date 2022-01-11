<?php

namespace App\Http\Controllers;

use App\Models\Kader;
use Illuminate\Http\Request;
use App\Exports\KaderExport;
use Excel;
use PDF;

class KaderController extends Controller
{
        public function index()
        {
            $kader = kader::orderBy('nama_kader','ASC')->simplePaginate(5);
            return view('kader.index',compact('kader'));
        } 
    
        public function store(Request $request)
        {
           

            $request->validate([
                'nama_kader'=>'required',
                'no_hp_kader'=>'required',
                'alamat_kader'=>'required',
            ]);
            
            $kader = Kader::create($request->all());
            return redirect()->route('kader.index')->with('toast_success', 'Data Kader Berhasil Ditambahkan!');
        }
    
        public function edit($id)
        {
            $kader = Kader::where('id', $id)->first();
            return response()->json([
            'data' => $kader,
            ]);
        }
    
        public function update(Request $request)
        { 
        $validasi = $request->validate([
                'nama_kader'=>'required',
                'no_hp_kader'=>'required',
                'alamat_kader'=>'required',
            ]);
            
        Kader::where('id', $request->id)
        ->update($validasi);
        return redirect()->route('kader.index')->with('toast_success', 'Data Kader Berhasil Diupdate!');
        }
    
        public function destroy($id)
        {
            Kader::destroy($id);
            return redirect('/kader')->with('toast_success','Data Kader Posyandu berhasil dihapus!');
        }

        public function exportpdf()
        {
            $kader = Kader::all();

            view()->share('kader', $kader);
            $pdf = PDF::loadview('kader.kader-pdf')->setPaper('a4','landscape');
            return $pdf->stream('kader.pdf');
        }

        public function exportIntoExcel()
        {
            return Excel::download(new KaderExport, 'kaderlist.xlsx');
        }

        public function exportIntoCSV()
        {
            return Excel::download(new KaderExport, 'kaderlist.csv');
        }
    }
    
 
