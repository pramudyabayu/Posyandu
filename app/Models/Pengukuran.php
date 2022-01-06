<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengukuran extends Model
{
    use HasFactory;
    protected $table= "pengukuran";
    protected $primaryKey = "id";
    protected $fillable = [
            'id',
            'jadwal_id',
            'balita_id',
            'usia',
            'bb',
            'tb',
            'cara_ukur',
            'vitamin_a',
            'asi',
            'pmt_ke',
            'sumber_pmt',
            'tgl_pemberian',
    ];

    public static function getPengukuran()
    {
        $records = DB::table('pengukuran')->select(
            'id',
            'jadwal_id',
            'balita_id',
            'usia',
            'bb',
            'tb',
            'cara_ukur',
            'vitamin_a',
            'asi',
            'pmt_ke',
            'sumber_pmt',
            'tgl_pemberian')->get()->toArray();
        return $records;
    }

    public function balita(){
        return $this->belongsTo(Balita::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }

}