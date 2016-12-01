<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class JenisDonat extends Model
{
    protected $table = 'jenis_donat';
    public $timestamps = false;
    
    protected $fillable = [
        'kode', 'nama', 'keterangan',
    ];

    static function generateKodeJenis()
    {
    	$data = DB::table('jenis_donat')
                ->max('kode');

        if($data != null){
            $no_akhir = (int) substr($data, 3 , 3);

            $no_akhir++;

            // $no = 'M'.sprintf("%04s", $noakhir);
            $no = 'DT-'.sprintf("%03s", $no_akhir);

            return $no;
        }else{
            return 'DT-001';
        }
    }
}
