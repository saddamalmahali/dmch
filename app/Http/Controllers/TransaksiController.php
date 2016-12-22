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
        return view('transaksi.pengeluaran.index');
    }

    public function list_pengeluaran(Request $request)
    {
        if($request->ajax())
        {
            $data = new Pengeluaran();
            $data = $data->paginate('10');
			return $this->responseAsJson('transaksi.pengeluaran.data', ['data'=>$data]);
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
        if($request->ajax())
        {
			echo json_encode($request->file('foto'));
            // $beli_bahan = new BeliBahan();
            // $beli_bahan->id_toko = $request->input('id_toko');
            // $beli_bahan->kode_beli = $request->input('kode_beli');
            // $beli_bahan->tanggal_beli = $request->input('tanggal_beli');
            // $beli_bahan->keterangan = $request->input('keterangan');

            // if($beli_bahan->save()){
            //     if($request->input('detile_beli') !== null){
            //         $data = $request->input('detile_beli');
            //         foreach ($data as $detile) {
            //             $detile_beli = new BeliBahanDetile();
            //             $detile_beli->id_beli = $beli_bahan->id;
            //             $detile_beli->id_barang = BeliBahanDetile::getBarangByNama($detile['id_barang']);
            //             $detile_beli->besaran = $detile['besaran'];
            //             $detile_beli->id_satuan = BeliBahanDetile::getIdSatuanByAlias($detile['id_satuan']);
            //             $detile_beli->harga = $detile['harga'];

            //             if($detile_beli->save()){
            //                 $harga_bahan = HargaBahan::where('id_barang', '=', $detile_beli->id_barang)->first();
            //                 if($harga_bahan != null){

            //                     $harga_bahan->harga = $detile_beli->harga;
            //                     $harga_bahan->keterangan = 'Harga Pembelian Terakhir'.date('d/m/Y', strtotime($beli_bahan->tanggal_beli));
            //                     $harga_bahan->save();
            //                 }else{
            //                     $harga_bahan = new HargaBahan();
            //                     $harga_bahan->kode = $harga_bahan->generateAutoNumber();
            //                     $harga_bahan->id_barang = $detile_beli->id_barang;
            //                     $harga_bahan->id_satuan = $detile_beli->id_satuan;
            //                     $harga_bahan->harga = $detile_beli->harga;
            //                     $harga_bahan->keterangan = 'Harga Pembelian Terakhir'.date('d/m/Y', strtotime($beli_bahan->tanggal_beli));
            //                     $harga_bahan->save();
            //                 }

            //             }
            //         }
            //     }

            //     $data = [
            //         'message'=>'Berhasil Menambahkan Bahan Yang Dibeli'
            //     ];

            //     return json_encode($data);
            //}
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
                    'message'=>'Berhasil Menghapus Data Pengeluaran'
                    ];

                    return json_encode($data);
                }

            }else{
                if($beli_bahan->delete()){
                    $data = [
                    'message'=>'Berhasil Menghapus Data Pengeluaran'
                    ];

                    return json_encode($data);
                }
            }
        }
    }



    public function view_pengeluaran($id)
    {
        $beli_bahan = BeliBahan::find($id);
        $data = $beli_bahan->detile;

        return view()->make('transaksi.pengeluaran.view', ['data'=>$data, 'beli_bahan'=>$beli_bahan])->render();
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
