<?php

namespace App\Exports;

use App\Models\Balita;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BalitaExport implements FromCollection, WithHeadings
{
	public function headings():array{
		return[
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
            'rw'
        ];
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Balita::all();
        return collect(Balita::getBalita());
    }
}
