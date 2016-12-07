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

    public function index_beli_bahan(Request $request)
    {
        return view('dapur.beli_bahan.index');
    }

    public function list_beli_bahan(Request $request)
    {
        if($request->ajax())
        {
            $data = new BeliBahan();
            $data = $data->paginate('10');

            return response()->json(view()->make('dapur.beli_bahan.data', ['data'=>$data])->render());
        }
    }

    public function tambah_dialog_beli_bahan()
    {
        $data_toko = new DataToko();
        $data_toko = $data_toko->get();
        return view()->make('dapur.beli_bahan.form_tambah', ['data_toko'=>$data_toko])->render();
    }

    public function tambah_beli_bahan(Request $request)
    {
        if($request->ajax())
        {

            $beli_bahan = new BeliBahan();
            $beli_bahan->id_toko = $request->input('id_toko');
            $beli_bahan->kode_beli = $request->input('kode_beli');
            $beli_bahan->tanggal_beli = $request->input('tanggal_beli');
            $beli_bahan->keterangan = $request->input('keterangan');

            if($beli_bahan->save()){
                if($request->input('detile_beli') !== null){
                    $data = $request->input('detile_beli');
                    foreach ($data as $detile) {
                        $detile_beli = new BeliBahanDetile();
                        $detile_beli->id_beli = $beli_bahan->id;
                        $detile_beli->id_barang = BeliBahanDetile::getBarangByNama($detile['id_barang']);
                        $detile_beli->besaran = $detile['besaran'];
                        $detile_beli->id_satuan = BeliBahanDetile::getIdSatuanByAlias($detile['id_satuan']);
                        $detile_beli->harga = $detile['harga'];

                        if($detile_beli->save()){
                            $harga_bahan = HargaBahan::where('id_barang', '=', $detile_beli->id_barang)->first();
                            if($harga_bahan != null){

                                $harga_bahan->harga = $detile_beli->harga;
                                $harga_bahan->keterangan = 'Harga Pembelian Terakhir'.date('d/m/Y', strtotime($beli_bahan->tanggal_beli));
                                $harga_bahan->save();
                            }else{
                                $harga_bahan = new HargaBahan();
                                $harga_bahan->kode = $harga_bahan->generateAutoNumber();
                                $harga_bahan->id_barang = $detile_beli->id_barang;
                                $harga_bahan->id_satuan = $detile_beli->id_satuan;
                                $harga_bahan->harga = $detile_beli->harga;
                                $harga_bahan->keterangan = 'Harga Pembelian Terakhir'.date('d/m/Y', strtotime($beli_bahan->tanggal_beli));
                                $harga_bahan->save();
                            }

                        }
                    }
                }

                $data = [
                    'message'=>'Berhasil Menambahkan Bahan Yang Dibeli'
                ];

                return json_encode($data);
            }
            // foreach ($data as $detile_beli) {
            //     echo $detile_beli['id_barang']."<br />";
            //     echo $detile_beli['besaran']."<br />";
            //     echo $detile_beli['id_satuan']."<br />";
            //     echo $detile_beli['harga']."<br />";
            // }
        }
    }

    public function hapus_beli_bahan(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->input('id');
            $beli_bahan = BeliBahan::find($id);

            if($beli_bahan->detile!= null){
                $detile = $beli_bahan->detile;
                foreach ($detile as $d) {
                    $d->delete();
                }

                if($beli_bahan->delete()){
                    $data = [
                    'message'=>'Berhasil Menghapus Bahan Yang Dibeli'
                    ];

                    return json_encode($data);
                }

            }else{
                if($beli_bahan->delete()){
                    $data = [
                    'message'=>'Berhasil Menghapus Bahan Yang Dibeli'
                    ];

                    return json_encode($data);
                }
            }
        }
    }



    public function view_beli_bahan($id)
    {
        $beli_bahan = BeliBahan::find($id);
        $data = $beli_bahan->detile;

        return view()->make('dapur.beli_bahan.view', ['data'=>$data, 'beli_bahan'=>$beli_bahan])->render();
    }

    // Menu Olah
    public function index_olah()
    {
        return $this->responseAsRender('dapur.olah.index');
    }

    public function index_data_olah(Request $request)
    {

        if($request->ajax()){
            $data = new Olah();
            $data = $data->paginate('9');
            return $this->responseAsJson('dapur.olah.data_olah', ['data'=>$data]);
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
			$list_detile = $olah->detile;

			return $this->responseAsRender('dapur.olah.view_olah', ['olah'=>$olah, 'list_detile'=>$list_detile]);
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
