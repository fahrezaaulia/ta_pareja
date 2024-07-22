<?php

namespace App\Exports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TamuExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Tamu::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Tamu',
            'Alamat',
            'Uang',
            'Status',
        ];
    }
}
