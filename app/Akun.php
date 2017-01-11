<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';

    public function sub_akun()
    {
        return $this->hasMany('App\Akun', 'header', 'id');
    }
}
