<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    public function list_detile(){
    	return $this->hasMany('App\PenjualanDetile', 'id_penjualan', 'id');
    }

    public function toko(){
    	return $this->hasOne('App\DataToko', 'id', 'id_toko');
    }
}
