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
use Illuminate\Support\Facades\DB;
use App\BeliBahan;
use App\Pengeluaran;
use App\PengeluaranDetile;
use App\BeliBahanDetile;
use App\JenisPengeluaran;
use Illuminate\Support\Facades\Input;

class TransaksiController extends Controller
{
    public function index_penjualan()
    {
		$data_toko = DataToko::all();
    	return $this->responseAsView('transaksi.penjualan.index', ['data_toko'=>$data_toko]);
    }

    public function data_penjualan(Request $request)
    {
    	if($request->ajax()){
    		$data_bulan = $request->input('bulan');
			$bulan = $data_bulan."-01";
			$id_toko = $request->input('id_toko');

			if($id_toko != null || $data_bulan != null){
				$data = Penjualan::where(DB::raw('MONTH(tanggal_penjualan)'),'=',date('m', strtotime($bulan)));
				$data = $data->where('id_toko', '=', $id_toko);
				$data = $data->orderBy('tanggal_penjualan', 'asc')->paginate('9');
				//echo json_encode($data);
				return $this->responseAsJson('transaksi.penjualan.tabel_penjualan', ['data'=>$data]);
			}else{
				$data = new Penjualan();
				$data = $data->orderBy('tanggal_penjualan', 'asc')->paginate('9');
				return $this->responseAsJson('transaksi.penjualan.tabel_penjualan', ['data'=>$data]);
			}
    	}
    }

    public function tambah_penjualan_dialog(Request $request)
    {
    	if($request->ajax())
    	{
    		$data_toko = DataToko::all();
    		$data_satuan = Satuan::where('jenis', '=', 'unit_penjualan')->get();
    		return $this->responseAsView('transaksi.penjualan.tambah_penjualan', ['data_toko'=>$data_toko, 'data_satuan'=>$data_satuan]);
    	}
    }

    public function get_data_barang(Request $request)
    {
    	if($request->ajax()){
    		$jenis = $request->input('jenis');
    		$id_satuan = $request->input('id_satuan');
    		if($jenis == 'pokok'){
    			$jenis = JenisDonat::all();
				$satuan = Satuan::where('jenis', '=', 'unit_penjualan')->get(); 
				$data = [
					'data'=>$jenis,
					'satuan'=>$satuan
				];
    			return json_encode($data);
    		}else if($jenis == 'umum'){
    			$barang = new Barang();
    			$barang = $barang->where('jenis', 'pelengkap')->get();
				$satuan = Satuan::where('jenis', '=', 'umum')->get();
				$data = [
					'data'=>$barang,
					'satuan'=>$satuan
				];
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
			$total_penjualan = $list_detile->sum('jumlah');

    		return $this->responseAsView('transaksi.penjualan.lihat_transaksi', ['penjualan'=>$penjualan, 'list_detile'=>$list_detile, 'total_penjualan'=>$total_penjualan]);
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

	//Menu Pengeluaran
	public function index_pengeluaran(Request $request)
    {	
				
		$data_jenis = JenisPengeluaran::all();

        return view('transaksi.pengeluaran.index', ['data_jenis'=>$data_jenis]);
    }

    public function list_pengeluaran(Request $request)
    {
        if($request->ajax())
        {
			$id_jenis = $request->input('id_jenis');
			$tanggal = $request->input('tanggal');
			$data_bulan = $tanggal.'-01';
			$jenis_pembayaran = $request->input('jenis_pembayaran');

			if(($id_jenis != null) || ($tanggal != null) || ($jenis_pembayaran != null) ){
				$data = new Pengeluaran();
				if($id_jenis != null){
					$data = $data->where('id_jenis', '=', $id_jenis);
				}

				if($tanggal != null){
					$data = $data->where(DB::raw('MONTH(tanggal)'), date('m', strtotime($data_bulan)));
				}

				if($jenis_pembayaran != null){
					$data = $data->where('jenis_pembayaran', '=', $jenis_pembayaran);
				}
				
				$data = $data->paginate('5');
				return $this->responseAsJson('transaksi.pengeluaran.data', ['data'=>$data]);
			}else{
				$data = new Pengeluaran();
            	$data = $data->paginate('5');
				return $this->responseAsJson('transaksi.pengeluaran.data', ['data'=>$data]);
			}
            
            //return response()->json(view()->make('transaksi.pengeluaran.data', ['data'=>$data])->render());
        }
    }

    public function tambah_dialog_pengeluaran()
    {
        $data_toko = new DataToko();
        $data_toko = $data_toko->get();
		$data_jenis_pengeluaran = new JenisPengeluaran();
		$data_jenis_pengeluaran = $data_jenis_pengeluaran->orderBy('nama_jenis', 'asc')->get();
        return view()->make('transaksi.pengeluaran.form_tambah', ['data_toko'=>$data_toko, 'data_jenis_pengeluaran'=>$data_jenis_pengeluaran])->render();
    }

	public function tambah_pengeluaran(Request $request)
    {
        if($request->ajax()){
            $pengeluaran = new Pengeluaran();
            $path_destination = '/public/uploads';
            $destination = base_path() . $path_destination;
            
			// return json_encode($request->all());
            $file = $request->file('file_foto')->getClientOriginalName();

            if($request->file('file_foto')->move($destination, $file)){
                $pengeluaran->id_toko = $request->input('id_toko');
                $pengeluaran->id_jenis = $request->input('id_jenis');
                $pengeluaran->jenis_pembayaran = $request->input('jenis_pembayaran');
                $pengeluaran->kode = $request->input('kode');
                $pengeluaran->tanggal = $request->input('tanggal');
                $pengeluaran->file = $path_destination.'/'.$file;
                $pengeluaran->keterangan = $request->input('keterangan');
				$data_detile = $request->input('detile_pengeluaran');

				
                if($pengeluaran->save()){

					if($data_detile != null){
						foreach ($data_detile as $detile) {
							$d_pengeluaran = new PengeluaranDetile();
							$d_pengeluaran->id_pengeluaran = $pengeluaran->id;
							$barang= Barang::getBarangByName($detile['id_barang']);
							$satuan = Satuan::getSatuanByAlias($detile['id_satuan']);
							$d_pengeluaran->id_barang = $barang->id;
							$d_pengeluaran->kuantitas = $detile['besaran'];
							$d_pengeluaran->id_satuan = $satuan->id;
							$d_pengeluaran->harga = $detile['harga'];

							$d_pengeluaran->save();
							

						}

						$data = [
                        'message'=>'Sukses Menambahkan Data Pengeluaran!'
						];

						return json_encode($data);
					}else{
						$data = [
							'message'=>'Sukses Menambahkan Data Pengeluaran!'
						];

						return json_encode($data);
					}

                    
                }
            }
        }
    }

    

    public function hapus_pengeluaran(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->input('id');
            $pengeluaran = Pengeluaran::find($id);
			
			$detile = $pengeluaran->detile;
			if($detile != null){
				foreach ($detile as $d) {
					$d->delete();
				}

				if($pengeluaran->delete()){
					$data = [
						'message'=> 'Sukses Menghapus Pengeluaran',
					];

					return json_encode($data);
				}else{
					if($pengeluaran->delete()){
						$data = [
							'message'=>'Sukses menghapus pengeluaran'
						];
						return json_encode($data);
					}
				}
			}
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



    public function view_pengeluaran($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $data = $pengeluaran->detile;

        return view()->make('transaksi.pengeluaran.view', ['data'=>$data, 'pengeluaran'=>$pengeluaran])->render();
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
