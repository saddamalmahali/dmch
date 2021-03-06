<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    	$barang = $barang->where('nama', 'like', "%".$nama."%")->select('id', 'nama')->get();
    	return $barang;
    }

    public function getAllSatuanByName($nama)
    {
        $satuan = new Satuan();
        $satuan = $satuan->where('nama', 'like', "%". $nama."%")->select('id', 'nama')->get();
        return $satuan;
    }

    public function getAllSatuanAliasByName($nama)
    {
        $satuan = new Satuan();
        $satuan = $satuan->where('nama', 'like', "%". $nama."%")->select('id', 'alias')->get();
        return $satuan;
    }

    public function generateAutoNumber(){
        $data = DB::table('harga_bahan')
                ->max('kode');

        if($data != null){
            $no_akhir = (int) substr($data, 3 , 3);

            $no_akhir++;

            // $no = 'M'.sprintf("%04s", $noakhir);
            $no = 'HB-'.sprintf("%03s", $no_akhir);

            return $no;
        }else{
            return 'HB-001';
        }
    }
    
}
