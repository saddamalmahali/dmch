<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataToko extends Model
{
    protected $table ='data_toko';
    public $timestamps = false;
    
    protected $fillable = [
        'kode', 'nama', 'alamat', 'kecamatan'
    ];
}
