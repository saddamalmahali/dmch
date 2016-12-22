<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LaporanKeuangan extends Model
{

    static function get_laporan_Pemasukan_tanggal($tanggal, $id_toko)
    {

        $daftarHargaPenjualan = new DaftarHargaPenjualan();
        


        // $penjualan->join('penjualan_detile', 'penjualan.id', '=', 'penjualan_detile.id_penjualan');
        // $penjualan->where('tanggal_penjualan', '=', $tanggal);
        // $penjualan->where('id_toko', '=', $id_toko);
        //$penjualan->select('');
        $penjualan = $daftarHargaPenjualan->get();

        return $penjualan;
    }

    

}