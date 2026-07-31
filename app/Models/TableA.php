<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableA extends Model
{
    //
    protected $table="table_a";

    protected $fillable=['kode_toko_baru','kode_toko_lama'];
}
