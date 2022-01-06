<?php

namespace App\Exports;

use App\Models\Kader;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KaderExport implements FromCollection,WithHeadings
{
	public function headings():array{
		return[
			'id',
	        'nama_kader',
	        'no_hp_kader',
	        'alamat_kader'
        ];
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Kader::all();
        return collect(Kader::getKader());
    }
}
