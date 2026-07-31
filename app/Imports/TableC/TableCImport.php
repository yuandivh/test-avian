<?php

namespace App\Imports\TableC;

use App\Models\TableC;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TableCImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TableC([
            //
            'kode_toko'=>$row['kode_toko'],
            'area_sales'=>$row['area_sales'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.kode_toko'=>'required|integer|gt:0',
            '*.area_sales'=>'required|string|max:10',
        ];
    }
}
