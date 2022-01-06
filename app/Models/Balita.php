<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Balita extends Model
{
    use HasFactory;
    protected $table= "balita";
    protected $primaryKey = "id";
    protected $fillable = [
            'id',
            'nama_balita',
    		'anak_ke',
    		'tgl_lahir',
            'jenis_kelamin',
    		'no_kk',
    		'nik_balita',
            'bb_lahir',
    		'tb_lahir',
            'kia',
            'imd',
            'nama_ortu',
            'nik_ortu',
            'no_hp',
            'alamat',
            'rt',
            'rw',    
    ];

    public static function getBalita()
    {
        $records = DB::table('balita')->select(
            'id',
            'nama_balita',
            'anak_ke',
            'tgl_lahir',
            'jenis_kelamin',
            'no_kk',
            'nik_balita',
            'bb_lahir',
            'tb_lahir',
            'kia',
            'imd',
            'nama_ortu',
            'nik_ortu',
            'no_hp',
            'alamat',
            'rt',
            'rw')->get()->toArray();
        return $records;
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
} 