<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;
    protected $table= "imunisasi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'tgl_imunisasi',
        'balita_id',
        'jenis_imunisasi',    
    ];
    public function balita(){
        return $this->belongsTo(Balita::class,'balita_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}