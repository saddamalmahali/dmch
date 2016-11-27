<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliBahan extends Model
{
    protected $table = 'beli_bahan';
    public $timestamps = false;
    
    protected $fillable = [
        'kode_beli', 'tanggal_beli', 'keterangan',
    ];

    public function detile()
    {
    	
    	return $this->hasMany('App\BeliBahanDetile', 'id_beli', 'id');
    }

}
