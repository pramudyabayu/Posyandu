<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
   //Menampilkan View Index
    public function index()
    {
        $balita = Balita::orderBy('created_at','ASC')->paginate(10);
        return view('balita.index', compact('balita'));
    } 


    //Melakukan Eksekusi Penyimpanan Ke Database
    public function store(Request $request)
    {
		
    	$request->validate([
    		'nama_balita'=> 'required',
    		'anak_ke'=> 'required',
    		'tgl_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
    		'no_kk'=> 'required',
    		'nik_balita'=> 'required',
            'bb_lahir'=> 'required',
    		'tb_lahir'=> 'required',
            'kia'=> 'required',
            'imd'=> 'required',
            'nama_ortu'=> 'required',
            'nik_ortu'=> 'required',
            'no_hp'=> 'required',
            'alamat'=> 'required',
            'rt'=> 'required',
            'rw'=> 'required'
    	]);
		
    	Balita::create($request->all());
    	return redirect()->route('balita.index')->with('status', 'Data Balita Berhasil Ditambahkan!');
    }

    public function show($id)
    {
    	//
    }

    public function edit($id)
    {
    	$balita = Balita::findOrFail($id);
    	return view('balita.edit', compact('balita'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
    		'nama_balita'=> 'required',
    		'anak_ke'=> 'required',
    		'tgl_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
    		'no_kk'=> 'required',
    		'nik_balita'=> 'required',
            'bb_lahir'=> 'required',
    		'tb_lahir'=> 'required',
            'kia'=> 'required',
            'imd'=> 'required',
            'nama_ortu'=> 'required',
            'nik_ortu'=> 'required',
            'no_hp'=> 'required',
            'alamat'=> 'required',
            'rt'=> 'required',
            'rw'=> 'required',
    	]);
    	Balita::where('id', $id)
    		->update([
                'nama_balita'=>$request->nama_balita,
                'anak_ke'=>$request->anak_ke,
                'tgl_lahir'=>$request->tgl_lahir,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'no_kk'=>$request->no_kk,
                'nik_balita'=>$request->nik_balita,
                'bb_lahir'=>$request->bb_lahir,
                'tb_lahir'=>$request->tb_lahir,
                'kia'=>$request->kia,
                'imd'=>$request->imd,
                'nama_ortu'=>$request->nama_ortu,
                'nik_ortu'=>$request->nik_ortu,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
                'rt'=>$request->rt,
                'rw'=>$request->rw,
    		]);

    	return redirect('/balita')->with('status', 'Data Balita Berhasil Diupdate!');
    }

    public function destroy($id)
    {
    	Balita::destroy($id);
    	return redirect('/balita')->with('status', 'Data Balita Berhasil Dihapus!');
    }
}