<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HargaBahan;
use App\Barang;
use App\Satuan;
use App\DataToko;
use App\Karyawan;
use App\BeliBahan;
use App\BeliBahanDetile;
use App\Olah;
use App\OlahDetile;
use App\Varian;



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
	    	$data = $data->orderBy('id_barang')->paginate('10');
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

    public function list_satuan(Request $request)
    {
        if($request->ajax())
        {
            $harga_bahan = new HargaBahan();
            $nama = $request->input('term');
            $data = $harga_bahan->getAllSatuanByName($nama);

            $hasil = array();

            foreach ($data as $i ) {
                array_push($hasil, $i);
            }

            echo json_encode($hasil);
        }
    }

    public function list_satuan_2(Request $request)
    {
        if($request->ajax())
        {
            $harga_bahan = new HargaBahan();
            $nama = $request->input('term');
            $data = $harga_bahan->getAllSatuanAliasByName($nama);

            $hasil = array();

            foreach ($data as $i ) {
                array_push($hasil, $i);
            }

            echo json_encode($hasil);
        }
    }

    public function daftar_harga_tambah(Request $request)
    {
        if($request->ajax()){
            $harga_bahan = new HargaBahan();
            $harga_bahan->kode = $request->input('kode');
            $harga_bahan->id_barang = $request->input('id_barang');
            $harga_bahan->id_satuan = $request->input('id_satuan');
            $harga_bahan->harga = $request->input('harga');
            $harga_bahan->keterangan = $request->input('keterangan');

            if($harga_bahan->save()){
                $data = [
                    'message'=>'Berhasil Menambahkan Barang'
                ];

                return json_encode($data);
            }
        }
    }

    

    // Menu Olah
    public function index_olah()
    {
        return $this->responseAsRender('dapur.olah.index');
    }

    public function index_data_olah(Request $request)
    {

        if($request->ajax()){
            // $data = new Olah();

            // if($request->input('tanggal') != null){
            //     $data->where('tanggal', '=', $request->input('tanggal'));
            // }
            
            // $data = $data->paginate('9');
            // return $this->responseAsJson('dapur.olah.data_olah', ['data'=>$data]);
            $tanggal = $request->input('tanggal');

            if($tanggal != null){
                $data = Olah::where('tanggal', '=', date('Y-m-d', strtotime($tanggal)));
                $data = $data->paginate("9");
                // echo json_encode($data);
                return $this->responseAsJson('dapur.olah.data_olah', ['data'=>$data]);
            }else{
                $data = Olah::all();
                return $this->responseAsJson('dapur.olah.data_olah', ['data'=>$data]);
            }
        }
    }

    public function tambah_olah_dialog()
    {
        $data_toko = DataToko::all();
		$varian = Varian::all();
        // $no_urut = Olah::generateAutoNumber();
        return $this->responseAsRender('dapur.olah.tambah_dialog', ['data_toko'=>$data_toko, 'data_varian'=>$varian]);
    }

    public function get_karyawan_toko(Request $request)
    {
        if($request->ajax())
        {
            $id_toko = $request->input('id_toko');

            $karyawan = new Karyawan();
            $karyawan = $karyawan->where('id_toko', '=', $id_toko)->get();

            return json_encode($karyawan);
        }
    }

    public function generate_kode(Request $request)
    {
        if($request->ajax())
        {
            $id_toko = $request->input('id_toko');

            $nomor = Olah::generateAutoNumber($id_toko);

            if($nomor != null)
            {
                return json_encode($nomor);
            }else{
                return json_encode(['data'=>'kosong']);
            }
        }
    }

		public function tambah_olah(Request $request)
		{
			if($request->ajax())
			{
				$olah = new Olah();
				$detile = $request->input('detile');
				$olah->id_toko = $request->input('id_toko');
				$olah->id_karyawan = $request->input('id_karyawan');
				$olah->tanggal = $request->input('tanggal');
				$olah->kode = $request->input('kode');
				$olah->keterangan = $request->input('keterangan');

				if($olah->save()){
					if($detile != null){
						foreach ($detile as $do) {
							$detile_olah = new OlahDetile();
							$detile_olah->id_olah = $olah->id;
							$detile_olah->id_varian = $do['id_varian'];
							$detile_olah->jumlah = $do['jumlah'];
							$detile_olah->save();
						}

						$data = [
							'message'=>'Sukses Menambahkan Data Olah!'
						];

						return json_encode($data);
					}else{
						$data = [
							'message'=>'Sukses Menambahkan Data Olah!'
						];
					}
				}else{
					$data = [
						'message'=>'Gagal Menambahkan Data Olah!'
					];
				}


			}
		}

		public function lihat_olah($id){
			$olah = Olah::find($id);
			$list_detile = $olah->list_detile;

			return $this->responseAsRender('dapur.olah.view_olah', ['olah'=>$olah, 'list_detile'=>$list_detile]);
		}

    public function hapus_olah(Request $request)
    {
        if($request->ajax())
        {
            $id_olah = $request->input('id');
            $olah = Olah::find($id_olah);

            if($olah->list_detile != null){
                foreach ($olah->list_detile as $detile) {
                    $detile->delete();
                }

                if($olah->delete()){
                    $data = [
                        'message'=>'Berhasil Menghapus Data Olah',
                    ];
                    return json_encode($data);
                }
            }

            
        }
    }



    //end of menu olah

    private function responseAsJson($page, $data=[])
    {
        if($data != null){
            return response()->json(view()->make($page, $data)->render());
        }else{
            return response()->json(view()->make($page)->render());
        }
    }

    private function responseAsRender($page, $data=[])
    {
        if($data != null){
            return view()->make($page, $data)->render();
        }else{
            return view()->make($page)->render();
        }

    }


}
