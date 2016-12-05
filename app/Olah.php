<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olah extends Model
{
    protected $table = 'olah';
    protected $dateFormat = 'U';
    public $timestamps = false;
    
    protected $fillable = [
        'id_toko', 'id_karyawan', 'kode', 'tanggal', 'keterangan'
    ];

    public function karyawan()
    {
    	return $this->hasOne('App\Karyawan', 'id', 'id_karyawan');
    }

}
