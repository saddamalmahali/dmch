<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komposisi extends Model
{
    protected $table = 'komposisi';
    public $timestamps = false;
    protected $fillable = [
        'id_varian', 'id_bahan'
    ];

    public function bahan()
    {
        return $this->hasOne('App\Barang', 'id', 'id_bahan');
    }

    public function satuan()
    {
        return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }
}
