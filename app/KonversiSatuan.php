<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonversiSatuan extends Model
{
    protected $table = 'konversi_satuan';
    public $timestamps = false;
    
    protected $fillable = [
        'id_satuan', 'nilai_satuan', 'id_konversi', 'nilai_konversi'
    ];

    public function satuan()
    {
    	return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }

    public function konversi()
    {
    	return $this->hasOne('App\Satuan', 'id', 'id_konversi');
    }
}
