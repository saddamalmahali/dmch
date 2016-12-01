<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    protected $table = 'varian';
    public $timestamps = false;
    
    protected $fillable = [
        'kode', 'id_jenis', 'rasa',
    ];

    public function jenis()
    {
        return $this->hasOne('App\JenisDonat', 'id', 'id_jenis');
    }

    public function list_komposisi()
    {
        return $this->hasMany('App\Komposisi', 'id_varian', 'id');
    }

    static function generateKodeVarian()
    {
    	$data = DB::table('varian')
                ->max('kode');

        if($data != null){
            $no_akhir = (int) substr($data, 3 , 3);

            $no_akhir++;

            // $no = 'M'.sprintf("%04s", $noakhir);
            $no = 'VR-'.sprintf("%03s", $no_akhir);

            return $no;
        }else{
            return 'VR-001';
        }
    }
}
