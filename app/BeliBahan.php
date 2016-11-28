<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliBahan extends Model
{
    protected $table = 'beli_bahan';
    public $timestamps = false;
    
    protected $fillable = [
        'id_toko', 'kode_beli', 'tanggal_beli', 'keterangan',
    ];

    public function detile()
    {
    	
    	return $this->hasMany('App\BeliBahanDetile', 'id_beli', 'id');
    }

    public function toko()
    {
        return $this->hasOne('App\DataToko', 'id', 'id_toko');
    }

}
