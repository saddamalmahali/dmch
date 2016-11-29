<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Karyawan;
use App\Satuan;
use App\DataToko;
use App\KonversiSatuan;
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

    //konversi satuan
    public function index_konversi()
    {
        return view('master.satuan.index_konversi');
    }

    public function data_konversi()
    {
        $data = new KonversiSatuan();
        $data = $data->paginate('9');

        return response()->json(view()->make('master.satuan.data_konversi', ['data'=>$data])->render());
    }

    public function tambah_konversi_dialog()
    {
        $satuan = Satuan::all();

        return view()->make('master.satuan.tambah_konversi', ['data_satuan'=>$satuan])->render();
    }

    public function tambah_konversi(Request $request)
    {
        if($request->ajax())
        {
            $konversi = new KonversiSatuan();
            $konversi->id_satuan = $request->input('id_satuan');
            $konversi->nilai_satuan = $request->input('nilai_satuan');
            $konversi->id_konversi = $request->input('id_konversi');
            $konversi->nilai_konversi = $request->input('nilai_konversi');

            if($konversi->save())
            {
                $data = [
                    'message'=> 'Berhasil Tambah Data Konversi!'
                ];

                return json_encode($data);
            }
        }
    }

    public function update_konversi_dialog($id)
    {
        $konversi = KonversiSatuan::find($id);
        $satuan = Satuan::all();

        return view()->make('master.satuan.update_konversi', ['data_satuan'=>$satuan, 'konversi'=>$konversi])->render();
    }

    public function update_konversi(Request $request)
    {
        if($request->ajax())
        {
            $konversi = KonversiSatuan::find($request->input('id'));
            $konversi->id_satuan = $request->input('id_satuan');
            $konversi->nilai_satuan = $request->input('nilai_satuan');
            $konversi->id_konversi = $request->input('id_konversi');
            $konversi->nilai_konversi = $request->input('nilai_konversi');

            if($konversi->save())
            {
                $data = [
                    'message'=> 'Berhasil Update Data Konversi!'
                ];

                return json_encode($data);
            }
        }
    }

    public function hapus_konversi($id)
    {
        $konversi = KonversiSatuan::find($id);

        if($konversi->delete())
        {
            return redirect('index_konversi');
        }
    }

    public function index_toko()
    {
        return view('master.data_toko.index');
    }

    public function data_toko(Request $request)
    {   
        if($request->ajax()){
            $data= new DataToko();
            $data = $data->paginate('5');

            return response()->json(view()->make('master.data_toko.data', ['data'=>$data])->render());


        }
    }

    public function toko_tambah_dialog()
    {
        return view()->make('master.data_toko.tambah_dialog');
    }

    public function data_toko_tambah(Request $request)
    {
        if($request->ajax()){
            $toko = new DataToko();
            $toko->kode = $request->input('kode');
            $toko->nama = $request->input('nama');
            $toko->alamat = $request->input('alamat');
            $toko->kecamatan = $request->input('kecamatan');

            if($toko->save()){
                $data = [
                    'message'=> 'Berhasil Menambahkan Toko!'
                ];

                return json_encode($data);
            }
        }
    }

    public function toko_update_dialog($id)
    {
        $toko = DataToko::find($id);

        return view()->make('master.data_toko.update_dialog', ['toko'=>$toko]);
    }

    public function data_toko_update(Request $request)
    {
        if($request->ajax()){
            $toko = DataToko::find($request->input('id'));
            $toko->kode = $request->input('kode');
            $toko->nama = $request->input('nama');
            $toko->alamat = $request->input('alamat');
            $toko->kecamatan = $request->input('kecamatan');

            if($toko->save()){
                $data = [
                    'message'=> 'Berhasil Update Toko!'
                ];

                return json_encode($data);
            }
        }
    }

    public function toko_hapus($id)
    {
        $toko = DataToko::find($id);
        if($toko->delete()){
            return redirect('data_toko');
        }
    }

    public function index_donat()
    {
        return view('master.donat.index');
    }

    public function data_jenis()
    {
        return response()->json(view()->make('master.donat.data_jenis')->render());
    }

    public function tabel_data_jenis()
    {
        return response()->json(view()->make('master.donat.tabel_data_jenis')->render());
    }

    public function data_donat()
    {
        return $this->responseAsJson('master.donat.data_donat');
    }

    public function tabel_data_donat()
    {
        return $this->responseAsJson('master.donat.tabel_data_donat');
    }

    private function responseAsJson($page, $data = [])
    {
        if($data != null){

        }else{
            return response()->json(view()->make($page)->render());
        }

    }

}
