<?php

namespace App\Imports\TableB;

use App\Models\TableB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TableBImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TableB([
            //
            'kode_toko'=>$row['kode_toko'],
            'nominal_transaksi'=>$row['nominal_transaksi']
        ]);
    }

    public function rules(): array
    {
        return[
            '*.kode_toko'=>'required|integer|gt:0',
            '*.nominal_transaksi'=>'required|numeric|min:0.00'
        ];
    }
}
