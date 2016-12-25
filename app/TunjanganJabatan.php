<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TunjanganJabatan extends Model
{
    protected $table = "tunjangan_jabatan";
    public $timestamps = false;

    public function jabatan(){
        return $this->hasOne('App\Jabatan', 'id', 'id_jabatan');
    }
}
