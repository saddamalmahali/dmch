<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function toko(){
      return $this->hasOne('App\DataToko', 'id', 'id_toko');
    }

    public function list_detile(){
      return $this->hasMany('App\OlahDetile', 'id_olah', 'id');
    }

    static function generateAutoNumber($id_toko){
        $data = self::select('kode')->orderBy('id', 'desc')->first();

        if($data != null){
            $no_akhir = substr($data->kode, 0 , 3);

            $no_akhir++;
            $toko = 'DMCH.Garut';
            $kode_toko = DataToko::find($id_toko)->kode;

            // $no = 'M'.sprintf("%04s", $noakhir);
            return sprintf("%03s", $no_akhir).'/'.$toko.'/'.$kode_toko.'/'.date('m').'/'.date('Y');

            return $no_akhir;
        }else{
            $no_urt = '001';
            $toko = 'DMCH.Garut';

            $kode_toko = DataToko::find($id_toko)->kode;
            return $no_urt.'/'.$toko.'/'.$kode_toko.'/'.date('m').'/'.date('Y');
        }

        // $kode = "001/DMCH.Garut/OLH/2016";

        // $no_urut = substr($kode, 0, 3);

        // return $no_urut;
    }

}
