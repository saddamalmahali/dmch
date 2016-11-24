<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HargaBahan;
use App\Barang;

class DapurGudangController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index_dh()
    {
    	return view('dapur.harga_bahan.index');
    }

    public function daftar_harga(Request $request)
    {
    	if($request->ajax()){
    		$data = new HargaBahan();
	    	$data = $data->paginate('10');
	    	return response()->json(view()->make('dapur.harga_bahan.data', ['data'=>$data])->render());	
    	}
    	
    }

    public function daftar_harga_tambah_dialog()
    {
    	return view()->make('dapur.harga_bahan.tambah')->render();
    }

    public function list_bahan(Request $request)
    {
    	if($request->ajax()){
    		$harga_bahan = new HargaBahan();
    		$nama = $request->input('term');
    		$data = $harga_bahan->getAllBarangByName($nama);

    		$hasil = array();

    		foreach ($data as $i) {
    			array_push($hasil, $i);
    		}

    		echo json_encode($hasil);
    	}
    	
    }
}
