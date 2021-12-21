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
            
            $kader = kader::create($request->all());
            return redirect('/kader')->with('success','Data Kader Posyandu berhasil ditambahkan!');
        }
    
        public function edit($id)
        {
            $kader = kader::find($id);
            return view('kader.edit' ,compact('kader'));
        }
    
        public function update(Request $request, $id)
        {
            $request->validate([
                'nama_kader'=>'required',
                'no_hp_kader'=>'required',
                'alamat_kader'=>'required',
            ]);
            
            kader::where('id',$id)
                    ->update([
                        'nama_kader'=>$request->nama_kader,
                        'no_hp_kader'=>$request->no_hp,
                        'alamat_kader'=>$request->alamat_kader,
                        
                    ]);
            return redirect('/kader')->with('success','Data Kader Posyandu berhasil diupdate!');
        }
    
        public function destroy($id)
        {
            kader::destroy($id);
            return redirect('/kader')->with('success','Data Kader Posyandu berhasil dihapus!');
        }
    }
    

