<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{

    protected $table = 'barang';
    protected $dateFormat = 'U';
    public $timestamps = false;
    
    protected $fillable = [
        'nama', 'jenis', 'keterangan',
    ];

    static function getBarangByName($name){
        return self::where('nama', '=', $name)->first();
    }
}
