<?php 

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    //menampilkan view index 
    public function index()
    {
        $jadwal = Jadwal::orderBy('created_at','ASC')->simplePaginate(5);
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
        return redirect()->route('jadwal.index')->with('toast_success','Jadwal berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $jadwal = Jadwal::where('id', $id)->first();

        return response()->json([
            'data' => $jadwal,
        ]);

    }

    public function update(Request $request)
    {
        $validasi = $request->validate([
            'tgl_pelayanan'=>'required',
            'jam_pelayanan'=>'required',
            'tempat_pelayanan'=>'required',
        ]);
        
        Jadwal::where('id', $request->id)
                ->update($validasi);
                return redirect()->route('jadwal.index')->with('toast_success','Data Jadwal Pelayanan berhasil diupdate!');
    }

    public function destroy($id)
    {
        Jadwal::destroy($id);
        return redirect('/jadwal');
    }

}