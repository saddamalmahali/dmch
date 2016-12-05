<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarHargaPenjualan extends Model
{
    protected $table = 'daftar_harga_penjualan';

    public $timestamps = false;

    public function data_jenis(){
    	return $this->hasOne('App\JenisDonat', 'id', 'id_jenis');
    }

    public function satuan(){
    	return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }
}
