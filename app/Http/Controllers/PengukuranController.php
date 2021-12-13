<?php

namespace App\Http\Controllers;

use App\Models\Pengukuran;
use App\Models\Balita;
use Illuminate\Http\Request;

class PengukuranController extends Controller
{
    public function index()
    {
        $pengukuran = Pengukuran::orderBy('created_at','ASC')->paginate(10);
        return view('pengukuran.index', compact('pengukuran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required',
            'balita_id'=>'required',
            'usia'=>'required',
            'bb'=>'required',
            'tb'=>'required',
            'cara_ukur'=>'required',
            'vitamin_a'=>'required',
            'asi'=>'required',
            'pmt_ke'=>'required',
            'sumber_pmt'=>'required',
            'tgl_pemberian'=>'required'
        ]);

        Pengukuran::create($request->all());
    	return redirect()->route('pengukuran.index')->with('status', 'Data Pengukuran Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
    	$pengukuran = Pengukuran::findOrFail($id);
    	return view('pengukuran.edit', compact('pengukuran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jadwal_id' => 'required',
            'balita_id'=>'required',
            'usia'=>'required',
            'bb'=>'required',
            'tb'=>'required',
            'cara_ukur'=>'required',
            'vitamin_a'=>'required',
            'asi'=>'required',
            'pmt_ke'=>'required',
            'sumber_pmt'=>'required',
            'tgl_pemberian'=>'required'
        ]);
        Pengukuran::where('id',$id)
        ->update([
            'jadwal_id'=>$request->jadwal_id,
            'balita_id'=>$request->balita_id,
            'usia'=>$request->usia,
            'bb'=>$request->bb,
            'tb'=>$request->tb,
            'cara_ukur'=>$request->cara_ukur,
            'vitamin_a'=>$request->vitamin_a,
            'asi'=>$request->asi,
            'pmt_ke'=>$request->pmt_ke,
            'sumber_pmt'=>$request->sumber_pmt,
            'tgl_pemberian'=>$request->tgl_pemberian,
            'catatan'=>$request->catatan,

        ]);
        return redirect('/pengukuran')->with('status','Data Pengukuran berhasil diupdate!');

    }

    public function destroy($id)
    {
        Pengukuran::destroy($id);
        return redirect('/pengukuran')->with('status','Data Pengukuran berhasil dihapus!');
    }



}