<?php

namespace App\Exports\TableD;

use App\Models\TableD;
use Maatwebsite\Excel\Concerns\FromCollection;

class TableDTemplateExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TableD::all();
    }
}
