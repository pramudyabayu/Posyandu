<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    //menampilkan view index
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index',compact('jadwal'));
    }


    //Melakukan Eksekusi Penyimpanan Ke Database
    public function store(Request $request)
    {
        $request->validate([
            'tgl_pelayanan'=>'required',
            'jam_pelayanan'=>'required',
            'tempat_pelayanan'=>'required',
        ]);
        
        $jadwal = Jadwal::create($request->all());
        return redirect('/jadwal')->with('status','Data Jadwal Pelayanan berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        return view('jadwal.edit' ,compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_pelayanan'=>'required',
            'jam_pelayanan'=>'required',
            'tempat_pelayanan'=>'required',
        ]);
        
        Jadwal::where('id',$id)
                ->update([
                    'tgl_pelayanan'=>$request->tgl_pelayanan,
                    'jam_pelayanan'=>$request->jam_pelayanan,
                    'tempat_pelayanan'=>$request->tempat_pelayanan,
                    
                ]);
        return redirect('/jadwal')->with('status','Data Jadwal Pelayanan berhasil diupdate!');
    }

    public function destroy($id)
    {
        Jadwal::destroy($id);
        return redirect('/jadwal')->with('status','Data Jadwal Pelayanan berhasil dihapus!');
    }

}