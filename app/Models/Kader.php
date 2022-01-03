<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user(){
        return $this->belongsTo(User::class);
    }
}