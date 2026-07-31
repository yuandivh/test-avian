<?php

namespace App\Imports\TableD;

use App\Models\TableD;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TableDImport implements ToModel,WithHeadingRow,WithValidation
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
            'kode_sales'=>$row['kode_sales'],
            'nama_sales'=>$row['nama_sales']
        ]);
    }

    public function rules(): array
    {
        return [
            '*.kode_sales'=>'required|string|min:1',
            '*.nama_sales'=>'required|string|max:20'
        ];
    }
}
