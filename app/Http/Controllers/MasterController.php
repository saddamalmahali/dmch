<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
class MasterController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function page_barang()
    {
    	$data = new Barang();

    	return view('master.barang.index', ['data'=>$data->all()]);
    }

    public function getDataBarang(Request $request)
    {
		$data = new Barang();
		$data = $data->paginate('9');

		if($request->ajax()){
			return response()->json(view()->make('master.barang.data', ['data'=>$data])->render());
		}
    }

    public function addDataBarang(Request $request)
    {
    	if($request->ajax()){
    		$barang = new Barang();
    		$barang->nama = $request->input('barang');
    		$barang->jenis = $request->input('jenis');
    		$barang->keterangan = $request->input('keterangan');
    		$barang->id_toko = 1;
    		$barang->save();

    		$data = [
    			'message'=>'Berhasil Menambahkan Barang'
    		];

    		return json_encode($data);
    	}
    }

}
