<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    public function list_detile(){
    	return $this->hasMany('App\PenjualanDetile', 'id_penjualan', 'id');
    }

    public function toko(){
    	return $this->hasOne('App\DataToko', 'id', 'id_toko');
    }

    static function generateAutoNumber($id_toko){
        $data = self::select('kode_penjualan')->orderBy('id', 'desc')->first();

        if($data != null){
            $no_akhir = substr($data->kode_penjualan, 0 , 3);

            $no_akhir++;
            $toko = 'DMCH.Garut';
            $pjl = 'PJL';
            $kode_toko = DataToko::find($id_toko)->kode;

            // $no = 'M'.sprintf("%04s", $noakhir);
            return sprintf("%03s", $no_akhir).'/'.$pjl.'-'.$toko.'/'.$kode_toko.'/'.date('Y');

            return $no_akhir;
        }else{
            $no_urt = '001';
            $toko = 'DMCH.Garut';
            $pjl = 'PJL';
            $kode_toko = DataToko::find($id_toko)->kode;
            return $no_urt.'/'.$pjl.'-'.$toko.'/'.$kode_toko.'/'.date('Y');
        }

        // $kode = "001/DMCH.Garut/OLH/2016";

        // $no_urut = substr($kode, 0, 3);

        // return $no_urut;
    }

    public function getDataChartPerTahun($tahun, $bulan)
    {
        $data = self::where(DB::raw('extract(YEAR from tanggal_penjualan)'), '=', $tahun);
        $data->where(DB::raw('extract(MONTH from tanggal_penjualan)'), '=', $bulan);
        $data = $data->get();
        return $data;
    }
}
