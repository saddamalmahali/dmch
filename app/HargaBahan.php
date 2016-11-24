<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HargaBahan extends Model
{
    protected $table = 'harga_bahan';
    public $timestamps = false;
    
    protected $fillable = [
        'kode', 'id_barang', 'id_satuan', 'harga', 'keterangan'
    ];

    public function barang()
    {
    	return $this->hasOne('App\Barang', 'id', 'id_barang');
    }

    public function satuan()
    {
    	return $this->hasOne('App\Satuan', 'id', 'id_satuan');
    }

    public function getAllBarangByName($nama)
    {
    	$barang = new Barang();
    	$barang->where('nama', 'like', "%".$nama."%")->select('id', 'nama')->get();
    	return $barang;
    }
}
