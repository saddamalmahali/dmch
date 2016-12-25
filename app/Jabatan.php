<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Jabatan extends Model
{
    protected $table = "jabatan";
    public $timestamps = false;
    static function generateKodeJenis()
    {
    	$data = DB::table('jabatan')
                ->max('kode');

        if($data != null){
            $no_akhir = (int) substr($data, 3 , 3);

            $no_akhir++;

            // $no = 'M'.sprintf("%04s", $noakhir);
            $no = 'JB-'.sprintf("%03s", $no_akhir);

            return $no;
        }else{
            return 'JB-001';
        }
    }
}
