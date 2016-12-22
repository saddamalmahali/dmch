<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarHargaPenjualan extends Model
{
    protected $table = 'daftar_harga_penjualan';

    public $timestamps = false;

    public function data_jenis(){
    	return $this->hasOne('App\JenisDonat', 'id', 'id_jenis');
    }

    public function satuan(){
    	return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }

    public function detile_penjualan(){
        return $this->hasMany('PenjualanDetile', 'id_barang', 'id_jenis');
    }

    public function get_jumlah_penjualan_barang($toko, $jenis, $satuan, $tanggal){
        $id_satuan = (int) $satuan;
        $id_jenis = (int) $jenis;

        $detile = new PenjualanDetile();
        $detile->where('id_barang','=', $id_jenis);
        $detile->where('id_satuan','=', $id_satuan);
        $detile->where('jenis','=', 'pokok');
        return $detile->sum('banyak');
    }
}
