<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenjualanDetile extends Model
{
    protected $table = 'penjualan_detile';
    public $timestamps = false;


    public function satuan()
    {
    	return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }

    public function barang()
    {
    	return $this->hasOne('App\Barang', 'id', 'id_barang');
    }

    public function JenisDonat()
    {
    	return $this->hasOne('App\JenisDonat', 'id', 'id_barang');
    }


}
