<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table= 'jadwal';
    protected $fillable = [
        'tgl_pelayanan',
        'jam_pelayanan',
        'tempat_pelayanan',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 21962ee215f340f84c04ed1522f0eed04c616b60
