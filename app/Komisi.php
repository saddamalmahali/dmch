<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komisi extends Model
{
    protected $table = 'komisi';
    public $timestamps = false;

    public function jenis()
    {
        return $this->hasOne('App\JenisDonat', 'id', 'id_jenis');
    }

    public function satuan()
    {
        return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }
}
