<?php

namespace App\Exports;

use App\Models\Pengukuran;
use App\Models\Balita;
use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengukuranExport implements FromCollection, WithHeadings
{
	public function headings():array{
		return[
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
            'tgl_pemberian'
        ];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Pengukuran::all();
        return collect(Pengukuran::getPengukuran());
    }
}
