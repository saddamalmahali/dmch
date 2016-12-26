<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';


    public function toko()
    {
        return $this->hasOne('App\DataToko', 'id', 'id_toko');
    }

    public function detile()
    {
        return $this->hasMany('App\PengeluaranDetile', 'id_pengeluaran','id');
    }
}
