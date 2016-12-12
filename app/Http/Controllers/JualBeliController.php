<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataToko;
use App\JenisDonat;
use App\Barang;
use App\HargaBahan;
use App\Penjualan;
use App\PenjualanDetile;
use App\Satuan;
use App\DaftarHargaPenjualan;

class JualBeliController extends Controller
{
    public function index_penjualan()
    {
    	return $this->responseAsView('transaksi.penjualan.index');
    }

    public function data_penjualan(Request $request)
    {
    	if($request->ajax()){
    		$data = new Penjualan();
    		$data = $data->paginate('9');
    		return $this->responseAsJson('transaksi.penjualan.tabel_penjualan', ['data'=>$data]);
    	}
    }

    public function tambah_penjualan_dialog(Request $request)
    {
    	if($request->ajax())
    	{
    		$data_toko = DataToko::all();
    		$data_satuan = Satuan::all();
    		return $this->responseAsView('transaksi.penjualan.tambah_penjualan', ['data_toko'=>$data_toko, 'data_satuan'=>$data_satuan]);
    	}
    }

    public function get_data_barang(Request $request)
    {
    	if($request->ajax()){
    		$jenis = $request->input('jenis');
    		$id_satuan = $request->input('id_satuan');
    		if($jenis == 'pokok'){
    			$data = JenisDonat::all();

    			return json_encode($data);
    		}else if($jenis == 'umum'){
    			$data = new Barang();
    			$data = $data->where('jenis', 'pelengkap')->get();
    			return json_encode($data);
    		}else{
    			return json_encode('');
    		}


    	}
    }

    public function get_harga_from_barang(Request $request)
    {
    	if($request->ajax()){
    		$id_jenis = $request->input('jenis_id');
    		$id_barang = $request->input('id_barang');
    		$id_satuan = $request->input('id_satuan');
    		if($id_jenis == 'pokok'){
    			$data = new DaftarHargaPenjualan();
    			$harga = $data->where('id_jenis', '=', $id_barang)->where('id_satuan', '=',$id_satuan)->first();
    			return json_encode($harga);
    		}else{
    			$data = new HargaBahan();
    			$harga = $data->where('id_barang', '=', $id_barang)->where('id_satuan', '=',$id_satuan)->first();
    			return json_encode($harga);
    		}
    	}
    }

    public function tambah_penjualan(Request $request)
    {
    	if($request->ajax()){
    		$id_toko = $request->input('id_toko');
    		$toko = DataToko::find($id_toko);

    		$penjualan = new Penjualan();
    		$penjualan->id_toko = $id_toko;
    		$penjualan->kode_penjualan = $request->input('kode_penjualan');
    		$penjualan->tanggal_penjualan = $request->input('tanggal_penjualan');

    		if($penjualan->save()){
    			if($request->input('detile')!= null){
	    			$data = $request->input('detile');
	    			foreach ($data as $detile) {
	    				$data_detile = new PenjualanDetile();
	    				$data_detile->id_penjualan = $penjualan->id;
	    				$data_detile->id_barang= $detile['input_barang'];
	    				$data_detile->banyak = $detile['banyak'];
	    				$data_detile->id_satuan = $detile['id_satuan'];
	    				$data_detile->jumlah = $detile['jumlah'];
	    				$data_detile->jenis = $detile['jenis'];
	    				$data_detile->save();
	    			}
	    			$data = [
	    				'message'=>'Berhasil Menambahkan Penjualan'
	    			];

	    			return json_encode($data);
	    		}else{
    				$data = [
		    			'message'=>'Berhasil Menambahkan Penjualan'
		    		];

		    		return json_encode($data);
	    			
	    		} 		
    		}

    		
    	}
    }

    public function hapus_penjualan(Request $request)
    {
    	if($request->ajax())
    	{
    		$penjualan = Penjualan::find($request->input('id'));

    		$detile = $penjualan->list_detile;

    		if($detile != null){
    			foreach ($detile as $d) {
    				$d->delete();
    			}

    			if($penjualan->delete()){
    				$data = [
    					'message' => 'Berhasil Menghapus Data Penjualan!'
    				];

    				return json_encode($data);
    			}
    		}else{
    			if ($penjualan->delete()) {
    				$data = [
    					'message' => 'Berhasil Menghapus Data Penjualan!'
    				];

    				return json_encode($data);
    			}
    		}
    	}
    }

    public function lihat_penjualan($id){
    	$penjualan = Penjualan::find($id);

    	if($penjualan != null){
    		$list_detile = $penjualan->list_detile;
    		$data_toko = $penjualan->toko;

    		return $this->responseAsView('transaksi.penjualan.lihat_transaksi', ['penjualan'=>$penjualan, 'list_detile'=>$list_detile]);
    	}
    }

	public function get_tabel_detile_toko(Request $request)
	{
		if($request->ajax()){
			$toko = DataToko::find($request->input('id_toko'));
			return $this->responseAsJson('transaksi.penjualan.tabel_detile_toko', ['toko'=>$toko]);
		}
	}

	public function penjualan_generate_nomor(Request $request)
	{
		if($request->ajax()){
			$id_toko = $request->input('id_toko');
			$kode = Penjualan::generateAutoNumber($id_toko);

			echo $kode; 
		}
	}

    public function responseAsView($page, $data=[])
    {
    	if($data != null){
    		return view($page, $data);    		
    	}else{
    		return view($page);
    	}
    }

    public function responseAsRender($page, $data=[])
    {
    	if($data != null)
    	{
    		return view()->make($page, $data)->render();
    	}else{
    		return view()->make($page)->render();
    	}
    }

    public function responseAsJson($page, $data=[])
    {
    	if($data != null)
    	{
    		return response()->json(view()->make($page, $data)->render());
    	}else{
    		return response()->json(view()->make($page)->render());
    	}
    }
}
