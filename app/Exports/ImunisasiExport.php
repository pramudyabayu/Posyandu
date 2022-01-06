<?php

namespace App\Exports;

use App\Models\Balita;
use App\Models\Imunisasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImunisasiExport implements FromCollection, WithHeadings
{
	public function headings():array{
		return[
			'id',
			'tgl_imunisasi',
			'balita_id',
			'jenis_imunisasi'
        ];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Imunisasi::all();
        return collect(Imunisasi::getImunisasi());
    }
}
