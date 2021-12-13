<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    use HasFactory;
    protected $table= "pengukuran";
    protected $primaryKey = "id";
    protected $fillable = [
            'tgl_pelayanan',
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
    public function balita(){
        return $this->belongsTo(Balita::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}