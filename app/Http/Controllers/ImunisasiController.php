<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    public function index()
    {
        $imunisasi = Imunisasi::orderBy('created_at','ASC')->paginate(10);
        return view('imunisasi.index', compact('imunisasi'));
    } 

    public function store(Request $request)
    {
        $request->validate([
            'tgl_imunisasi' => 'required',
            'balita_id'=>'required',
            'jenis_imunisasi'=>'required',
        ]);

        Pengukuran::create($request->all());
    	return redirect()->route('imunisasi.index')->with('status', 'Data Imunisasi Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
    	$imunisasi = Imunisasi::findOrFail($id);
    	return view('imunisasi.edit', compact('imunisasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_imunisasi' => 'required',
            'balita_id'=>'required',
            'jenis_imunisasi'=>'required'
        ]);
        Imunisasi::where('id',$id)
        ->update([
            'tgl_imunisasi'=>$request->tgl_imunisasi,
            'balita_id'=>$request->balita_id,
            'jenis_imunisasi'=>$request->jenis_imunisasi,
            
        ]);
        return redirect('/imunisasi')->with('status','Data Imunisasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        Imunisasi::destroy($id);
        return redirect('/imunisasi')->with('status','Data Imunisasi berhasil dihapus!');
    }
}
