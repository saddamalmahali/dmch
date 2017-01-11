<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriAkun extends Model
{
    protected $table = 'kategori_akun';

    public function list_akun(){
        return $this->hasMany('App\Akun', 'id_kategori', 'id' );
    }
}
