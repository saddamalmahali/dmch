<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class BeliBahanDetile extends Model
{
    protected $table = 'beli_bahan_detile';
    public $timestamps = false;
    
    protected $fillable = [
        'id_beli', 'id_barang', 'besaran', 'id_satuan', 'harga'
    ];

    public function beli_bahan()
    {
    	return $this->hasOne('App\BeliBahan', 'id', 'id_beli');
    }

    public function barang()
    {
    	return $this->hasOne('App\Barang', 'id', 'id_barang');
    }

    public function satuan()
    {
    	return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }

    static function getBarangByNama($nama){
    	$data = DB::table('barang')
    			->where('nama', '=', $nama)
    			->select('id')
    			->get();

    	foreach ($data as $barang) {
    		return $barang->id;
    	}
    }
    static function getIdSatuanByAlias($nama){
    	$data = DB::table('satuan')
    			->where('alias', '=', $nama)
    			->select('id')
    			->get();

    	foreach ($data as $satuan) {
    		return $satuan->id;
    	}
    }
}
