<?php

namespace App\Exports\TableD;

use App\Models\TableD;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TableDExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TableD::select(
            'kode_sales',
            'nama_sales'
        )->get();
    }

    public function headings(): array
    {
        return [
            "Kode sales",
            "Nama sales"
        ];
    }
}
