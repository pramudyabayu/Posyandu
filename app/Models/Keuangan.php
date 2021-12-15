<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    use HasFactory;
    protected $table= 'Keuangan';
    protected $fillable = [
        'tanggal',
        'pemasukan',
        'pengeluaran',
        'catatan',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
  
}