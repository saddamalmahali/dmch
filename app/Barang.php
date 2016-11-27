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
}
