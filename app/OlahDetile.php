<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OlahDetile extends Model
{
    protected $table = 'olah_detile';
    public $timestamps = false;

    public function olah(){
      return $this->hasOne('App\Olah', 'id', 'id_olah');
    }

    public function varian()
    {
      return $this->hasOne('App\Varian', 'id', 'id_varian');
    }

}
