<?php

namespace App\Http\Controllers;

use App\Models\Kader;
use Illuminate\Http\Request;

class KaderController extends Controller
{
        public function index()
        {
            $kader = kader::all();
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
            return redirect()->route('kader.index')->with('success', 'Data Kader Berhasil Ditambahkan!');
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
        return redirect()->route('kader.index')->with('success', 'Data Kader Berhasil Diupdate!');
        }
    
        public function destroy($id)
        {
            Kader::destroy($id);
            return redirect('/kader')->with('success','Data Kader Posyandu berhasil dihapus!');
        }
    }
    
 
