<?php

namespace App\Exports\TableB;

use App\Models\TableB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TableBTemplateExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect();
    }

    public function headings(): array
    {
        return [
            'kode_toko',
            'nominal_transaksi'
        ];
    }
}
