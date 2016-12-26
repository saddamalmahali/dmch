<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengeluaranDetile extends Model
{
    protected $table ='pengeluaran_detile';

    public $timestamps = false;
    
    public function barang(){
        return $this->hasOne('App\Barang', 'id', 'id_barang');
    }

    public function satuan(){
        return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }
}
