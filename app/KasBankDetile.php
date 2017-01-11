<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasBankDetile extends Model
{
    protected $table = 'kas_bank_detile';

    public function kas_bank()
    {
        return $this->hasOne('App\KasBank', 'id', 'id_kas_bank');
    }
}
