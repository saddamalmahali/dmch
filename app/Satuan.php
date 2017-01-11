<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuan';
    public $timestamps = false;

    protected $fillable = [
        'nama', 'alias', 'keterangan',
    ];

    static function getSatuanByAlias($name){
        return self::where('alias', '=', $name)->first();
    }

    public function konversi()
    {
        return $this->hasOne('App\KonversiSatuan', 'id_konversi', 'id');
    } 
    
}
