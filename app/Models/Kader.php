<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kader extends Model
{
    use HasFactory;
    protected $table= 'kader';
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nama_kader',
        'no_hp_kader',
        'alamat_kader',
    ];

    public static function getKader()
    {
        $records = DB::table('kader')->select(
        'id',
        'nama_kader',
        'no_hp_kader',
        'alamat_kader')->get()->toArray();
        return $records;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}