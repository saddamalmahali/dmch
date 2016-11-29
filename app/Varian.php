<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    protected $table = 'varian';
    public $timestamps = false;
    
    protected $fillable = [
        'kode', 'id_jenis', 'rasa',
    ];
}
