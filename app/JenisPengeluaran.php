<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    protected $table = 'jenis_pengeluaran';

    static function generateKodeJenis()
    {
    	$data = DB::table('jenis_pengeluaran')
                ->max('kode_jenis');

        if($data != null){
            $no_akhir = (int) substr($data, 3 , 3);

            $no_akhir++;

            // $no = 'M'.sprintf("%04s", $noakhir);
            $no = 'JP-'.sprintf("%03s", $no_akhir);

            return $no;
        }else{
            return 'JP-001';
        }
    }
}
