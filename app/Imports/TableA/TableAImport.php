<?php

namespace App\Imports\TableA;

use App\Models\TableA;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TableAImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TableA([
            //
            'kode_toko_baru'=>$row['kode_toko_baru'],
            'kode_toko_lama'=>$row['kode_toko_lama'],
        ]);
    }

    public function rules(): array
    {
        return[
            '*.kode_toko_baru'=>'required|integer|min:0',
            '*.kode_toko_lama'=>'required|integer|min:0',
        ];
    }
}
