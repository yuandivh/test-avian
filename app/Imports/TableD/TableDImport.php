<?php

namespace App\Imports\TableD;

use App\Models\TableD;
use Maatwebsite\Excel\Concerns\ToModel;

class TableDImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TableD([
            //
        ]);
    }
}
