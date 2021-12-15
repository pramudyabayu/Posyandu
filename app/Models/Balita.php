<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;
    protected $table= "balita";
    protected $primaryKey = "id";
    protected $fillable = [
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
    
    public function imunisasi(){
        return $this->hasMany(Imunisasi::class);
    }
}