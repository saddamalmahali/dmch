<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Karyawan;
use App\Satuan;
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

    public function tambahDialog()
    {
    	return view()->make('master.barang.dialog')->render();
    }

    public function hapus_barang($id)
    {
    	$barang = Barang::find($id);
    	$barang->delete();
    	return redirect('barang');
    }

    public function update_barang($id)
    {
    	$barang = Barang::find($id);
    	return view()->make('master.barang.update', ['barang'=>$barang])->render();
    }

    public function post_update_barang(Request $request)
    {
    	if($request->ajax()){
    		$barang = Barang::find($request->input('id'));
    		$barang->nama = $request->input('barang');
    		$barang->jenis = $request->input('jenis');
    		$barang->keterangan = $request->input('keterangan');
    		$barang->id_toko = 1;
    		$barang->save();

    		$data = [
    			'message'=>'Berhasil Update Barang'
    		];

    		return json_encode($data);
    	}
    }

    /*  Karyawan  */
    public function index_karyawan()
    {
        return view('master.karyawan.index');
    }

    public function tambah_karyawan()
    {
        return view('master.karyawan.tambah');
    }

    public function karyawan_add(Request $request)
    {
        if($request->ajax()){
            $karyawan = new Karyawan();
            $karyawan->nama_depan = $request->input('nama_depan');
            $karyawan->nama_belakang = $request->input('nama_belakang');
            $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
            $karyawan->tempat_lahir = $request->input('tempat_lahir');
            $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
            $karyawan->alamat = $request->input('alamat');

            if($karyawan->save()){
                $data = [
                    'message'=> 'Berhasil Menambahkan Karyawan!'
                ];

                return json_encode($data);
            }
        }
    }

    public function get_data(Request $request)
    {
        $karyawan = new Karyawan();
        $karyawan = $karyawan->paginate('10');

        if($request->ajax()){
            return response()->json(view()->make('master.karyawan.data',['data'=>$karyawan])->render());
        }
    }

    public function update_karyawan_form($id){
        $karyawan = Karyawan::find($id);

        return view()->make('master.karyawan.update', ['karyawan'=>$karyawan])->render();
    }

    public function karyawan_update(Request $request)
    {
        if($request->ajax()){
            $karyawan = Karyawan::find($request->input('id'));
            $karyawan->nama_depan = $request->input('nama_depan');
            $karyawan->nama_belakang = $request->input('nama_belakang');
            $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
            $karyawan->tempat_lahir = $request->input('tempat_lahir');
            $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
            $karyawan->alamat = $request->input('alamat');

            if($karyawan->save()){
                $data = [
                    'message'=> 'Berhasil Update Data Karyawan!'
                ];

                return json_encode($data);
            }
        }
    }

    public function hapus_karyawan($id)
    {
        $karyawan = Karyawan::find($id);
        if($karyawan->delete()){
            return redirect('karyawan');
        }
    }

    /* ------------- MENU SATUAN --------------- */
    public function index_satuan()
    {
        return view('master.satuan.index');
    }

    public function get_list_satuan(){
        $data = new Satuan();
        $data = $data->paginate('9');

        return response()->json(view()->make('master.satuan.data', ['data'=>$data])->render());
    }

    public function tambah_satuan_dialog()
    {
        return view('master.satuan.tambah');
    }

    public function tambah_satuan( Request $request)
    {
        if($request->ajax()){
            $satuan = new Satuan();
            $satuan->nama = $request->input('nama');
            $satuan->alias = $request->input('alias');
            $satuan->keterangan = $request->input('keterangan');

            if($satuan->save()){
                $data = [
                    'message'=> 'Berhasil Menambahkan Satuan!'
                ];

                return json_encode($data);
            }

        }
    }

    public function update_satuan_dialog($id){
        $satuan = Satuan::find($id);

        return view()->make('master.satuan.update', ['satuan'=>$satuan])->render();
    }

    public function update_satuan(Request $request)
    {
        if($request->ajax()){
            $satuan = Satuan::find($request->input('id'));
            $satuan->nama = $request->input('nama');
            $satuan->alias = $request->input('alias');
            $satuan->keterangan = $request->input('keterangan');

            if($satuan->save()){
                $data = [
                    'message'=> 'Berhasil Update Data Satuan!'
                ];

                return json_encode($data);
            }
        }
    }

    public function delete_satuan($id)
    {
        $satuan = Satuan::find($id);

        if($satuan->delete()){
            return redirect('index_satuan');
        }
    }

}
