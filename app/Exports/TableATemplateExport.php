<?php

namespace App\Exports;

use App\Models\TableA;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TableATemplateExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect();
    }
    public function headings(): array{
        return [
            'kode_toko_baru',
            'kode_toko_lama'
        ];
    }
}
