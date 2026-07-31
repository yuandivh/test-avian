<?php

namespace App\Exports\TableC;

use App\Models\TableC;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TableCTemplateExport implements FromCollection, WithHeadings
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
            'area_sales'
        ];
    }
}
