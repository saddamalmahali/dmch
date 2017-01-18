<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Karyawan;
use App\JenisDonat;
use App\Satuan;
use App\Varian;
use App\Komposisi;
use App\DataToko;
use App\KonversiSatuan;
use App\DaftarHargaPenjualan;
use App\Komisi;
use App\Jabatan;
use App\JenisPengeluaran;
use App\TunjanganJabatan;
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
        $toko =DataToko::all();

        return view('master.karyawan.tambah', ['toko'=>$toko]);
    }

    public function karyawan_add(Request $request)
    {
        if($request->ajax()){
            $karyawan = new Karyawan();
            $karyawan->id_toko = $request->input('id_toko');
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
        $toko =DataToko::all();
        return view()->make('master.karyawan.update', ['karyawan'=>$karyawan, 'toko'=>$toko])->render();
    }

    public function karyawan_update(Request $request)
    {
        if($request->ajax()){
            $karyawan = Karyawan::find($request->input('id'));
            $karyawan->id_toko = $request->input('id_toko');
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
            $satuan->jenis = $request->input('jenis');

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
            $satuan->jenis = $request->input('jenis');
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
        $jenis_donat = new JenisDonat();
        $jenis_donat = $jenis_donat->paginate('5');
        return response()->json(view()->make('master.donat.tabel_data_jenis', ['jenis_donat'=>$jenis_donat])->render());
    }

    public function data_donat()
    {
        return $this->responseAsJson('master.donat.data_donat');
    }

    public function tabel_data_donat()
    {
        $data = new Varian();
        $data = $data->paginate('9');
        return $this->responseAsJson('master.donat.tabel_data_donat', ['data'=>$data]);
    }

    public function tambah_jenis_dialog()
    {
        $kode_jenis = JenisDonat::generateKodeJenis();
        return $this->responseAsRender('master.donat.dialog_tambah_jenis', ['kode_jenis'=>$kode_jenis]);
    }

    public function update_jenis_dialog($id)
    {
        $jenis_donat = JenisDonat::find($id);

        return $this->responseAsRender('master.donat.dialog_update_jenis', ['jenis_donat'=>$jenis_donat]);
    }

    public function tambah_jenis_donat(Request $request)
    {
        if($request->ajax())
        {
            $jenis_donat = new JenisDonat();
            $jenis_donat->kode = $request->input('kode');
            $jenis_donat->nama = $request->input('nama');
            $jenis_donat->keterangan = $request->input('keterangan');

            if($jenis_donat->save()){
                $data = [
                    'message'=> 'Berhasil Tambah Jenis!'
                ];

                return json_encode($data);
            }
        }
    }

    public function update_jenis_donat(Request $request)
    {
        if($request->ajax())
        {
            $jenis_donat = JenisDonat::find($request->input('id'));
            $jenis_donat->kode = $request->input('kode');
            $jenis_donat->nama = $request->input('nama');
            $jenis_donat->keterangan = $request->input('keterangan');

            if($jenis_donat->save()){
                $data = [
                    'message'=> 'Berhasil Update Jenis!'
                ];

                return json_encode($data);
            }
        }
    }

    public function hapus_jenis_donat(Request $request)
    {
        if($request->ajax())
        {
            $jenis_donat = JenisDonat::find($request->input('id'));

            if($jenis_donat->delete()){
                $data = [
                    'message'=> 'Berhasil Hapus Jenis Donat!'
                ];

                return json_encode($data);
            }
        }
    }

    public function tambah_donat_dialog()
    {
        $jenis_donat = JenisDonat::all();
        $kode_varian = Varian::generateKodeVarian();
        $barang = new Barang();
        $barang = $barang->where('jenis', '=', 'pokok')->get();
        return $this->responseAsRender('master.donat.dialog_tambah', ['data'=>$jenis_donat, 'kode_varian'=>$kode_varian, 'data_bahan'=>$barang]);
    }

    public function tambah_donat(Request $request)
    {
        if($request->ajax())
        {
            // return json_encode($request->all());
            $donat = new Varian();
            $donat->id_jenis = $request->input('id_jenis');
            $donat->kode = $request->input('kode');
            $donat->rasa = $request->input('rasa');

            if($donat->save()){

                if($request->input('list_komposisi')!== null){
                    $data = $request->input('list_komposisi');

                    foreach($data as $k) {
                        $komposisi = new Komposisi();
                        $barang= Barang::getBarangByName($k['id_bahan']);
						$satuan = Satuan::getSatuanByAlias($k['id_satuan']);
                        $komposisi->id_varian = $donat->id;
                        $komposisi->id_bahan = $barang->id;
                        $komposisi->kuantitas = $k['kuantitas'];
                        $komposisi->id_satuan = $satuan->id;
                        $komposisi->save();
                    }

                    $data = [
                        'message'=> 'Berhasil Tambah Varian Donat!'
                    ];

                    return json_encode($data);
                }else{
                    $data = [
                        'message'=> 'Berhasil Tambah Varian Donat!'
                    ];

                    return json_encode($data);
                }

                
            }
        }
    }

    public function hapus_donat(Request $request)
    {
        if($request->ajax()){
            // return var_dump($request->all());
            $varian = Varian::find($request->input('id_donat'));

            if($varian->list_komposisi !== null){
                $list_komposisi = $varian->list_komposisi;
                foreach ($list_komposisi as $komposisi){
                        $komposisi->delete();
                }    
                if($varian->delete()){
                    $data = [
                            'message'=> 'Berhasil Hapus Varian Donat!'
                        ];

                        return json_encode($data);
                }
            }

            // if($varian->delete()){
            //     $data = [
            //             'message'=> 'Berhasil Hapus Varian Donat!'
            //         ];

            //         return json_encode($data);
            // }
            
        }
    }

    public function detile_donat($id)
    {
        $donat = Varian::find($id);
        $list_komposisi = $donat->list_komposisi;

        return $this->responseAsRender('master.donat.view', ['donat'=>$donat, 'data_komposisi'=>$list_komposisi]);
    }


    //Menu Harga Jual
    public function index_harga_jual()
    {
        return $this->responseAsView('master.harga_jual.index');
    }

    public function get_data_harga_jual()
    {
        $data = new DaftarHargaPenjualan();
        $data = $data->orderBy('id_jenis', 'asc')->paginate('9');

        return $this->responseAsJson('master.harga_jual.tabel_harga', ['data'=>$data]);
    }

    public function tambah_harga_jual_dialog()
    {
        $data_satuan = Satuan::where('jenis', '=', 'jenis_penjualan')->get();
        return $this->responseAsRender('master.harga_jual.tambah_dialog', ['data_satuan'=>$data_satuan]);
    }

    public function harga_jual_get_jenis(Request $request)
    {   
        if($request->ajax())
        {
            $kategori = $request->input('id_kategori');

            if($kategori == 'pokok')
            {
                $satuan = Satuan::where('jenis','=','unit_penjualan')->get();
                $jenis = JenisDonat::all();
                $data = [
                    'satuan'=>$satuan,
                    'jenis'=>$jenis
                ];
                return json_encode($data);
            }
            else if($kategori == 'umum')
            {
                $barang = new Barang();
                $satuan = Satuan::where('jenis','=','umum')->get();
                $barang = $barang->where('jenis', '=', 'pelengkap')->get();
                $data = [
                    'satuan'=>$satuan,
                    'jenis'=>$barang
                ];
                return json_encode($data);
            }
        }
    }

    public function tambah_harga_jual(Request $request)
    {
        if($request->ajax()){
            $harga_jual = new DaftarHargaPenjualan();
            $harga_jual->jenis = $request->input('id_kategori');
            $harga_jual->id_jenis = $request->input('id_jenis');
            $harga_jual->id_satuan = $request->input('satuan');
            $harga_jual->harga = $request->input('harga');
            if($harga_jual->save())
            {
                $data = [
                    'message'=> 'Berhasil Tambah Harga Jual!'
                ];

                return json_encode($data);
            }
        }
    }

    public function update_harga_jual(Request $request)
    {
        if($request->ajax()){
            $harga_jual = DaftarHargaPenjualan::find($request->input('id'));
            $harga_jual->id_jenis = $request->input('id_jenis');
            $harga_jual->id_satuan = $request->input('satuan');
            $harga_jual->harga = $request->input('harga');
            if($harga_jual->save())
            {
                $data = [
                    'message'=> 'Berhasil Update Harga Jual!'
                ];

                return json_encode($data);
            }
        }
    }

    public function update_harga_jual_dialog($id)
    {
        $harga_jual = DaftarHargaPenjualan::find($id);
        $data_satuan = Satuan::all();
        $data_jenis = '';
        if($harga_jual->jenis == 'pokok'){
            $data_jenis = JenisDonat::all();
        }else{
            $data_jenis = Barang::all();
        }
        return $this->responseAsRender('master.harga_jual.update_dialog', ['harga_jual'=> $harga_jual, 'data_satuan'=>$data_satuan, 'data_jenis'=>$data_jenis]);
    }

    public function hapus_harga_jual(Request $request)
    {
        $id = $request->input('id');
        $harga_jual = DaftarHargaPenjualan::find($id);
        if($harga_jual->delete()){
            $data = [
                'message'=>'Berhasil Menghapus Harga Jual'
            ];

            return json_encode($data);
        }

    }

    //end of menu Harga Jual

    //menu komisi
    public function index_komisi()
    {
        return $this->responseAsView('master.komisi.index');
    }

    public function get_data_komisi()
    {
        $data = Komisi::all();
        return $this->responseAsJson('master.komisi.data_komisi', ['data'=>$data]);
    }

    public function tambah_komisi_dialog()
    {
        $list_satuan = Satuan::all();
        $list_jenis = JenisDonat::all();

        return $this->responseAsView('master.komisi.tambah_dialog', ['list_satuan'=>$list_satuan, 'list_jenis'=>$list_jenis]);
    }

    public function tambah_komisi(Request $request)
    {
        if($request->ajax())
        {
            $komisi = new Komisi();
            $komisi->id_jenis = $request->input('id_jenis');
            $komisi->id_satuan = $request->input('id_satuan');
            $komisi->komisi = $request->input('komisi');
            $komisi->keterangan = $request->input('keterangan');

            if($komisi->save()){
                $data = [
                    'message'=>'Berhasil Menambahkan data Komisi',
                ];

                return json_encode($data);
            }
        }
    }

    public function hapus_komisi(Request $request)
    {
        if($request->ajax()){
            $komisi = Komisi::find($request->input('id'));

            if($komisi->delete()){
                $data = [
                    'message'=>'Berhasil Menghapus data Komisi',
                ];

                return json_encode($data);
            }else{
                $data = [
                    'message'=>'Gagal Menghapus data Komisi',
                ];
            }
        }
    }

    public function update_komisi_dialog($id)
    {
        $komisi = Komisi::find($id);
        $list_satuan = Satuan::all();
        $list_jenis = JenisDonat::all();

        return $this->responseAsRender('master.komisi.update_dialog', ['list_satuan'=>$list_satuan, 'list_jenis'=>$list_jenis, 'komisi'=>$komisi]);
    }


    public function update_komisi(Request $request)
    {
        if($request->ajax()){
            $komisi = Komisi::find($request->input('id'));

            $komisi->id_jenis = $request->input('id_jenis');
            $komisi->id_satuan = $request->input('id_satuan');
            $komisi->komisi = $request->input('komisi');
            $komisi->keterangan = $request->input('keterangan');

            if($komisi->save()){
                $data = [
                    'message'=>'Berhasil Menambahkan data Komisi',
                ];

                return json_encode($data);
            }
        }
    }
    //end of menu komisi

    //Menu Jenis Pengeluaran
    public function index_jenis_pengeluaran()
    {
        return $this->responseAsView('master.jenis_pengeluaran.index');
    }

    public function get_tabel_jenis_pengeluaran(Request $request)
    {
        if($request->ajax()){
            $data = new JenisPengeluaran();

            $data = $data->paginate('5');
            return $this->responseAsJson('master.jenis_pengeluaran.tabel_data', ['data'=>$data]);
        }
    }

    public function tambah_jenis_pengeluaran_dialog()
    {
        $kode= JenisPengeluaran::generateKodeJenis();
        return $this->responseAsRender('master.jenis_pengeluaran.form_tambah', ['kode'=>$kode]);
    }

    public function tambah_jenis_pengeluaran(Request $request)
    {
        if($request->ajax()){
            $jenis_pengeluaran = new JenisPengeluaran();
            $jenis_pengeluaran->kode_jenis = $request->input('kode_jenis');
            $jenis_pengeluaran->nama_jenis = $request->input('nama_jenis');
            $jenis_pengeluaran->keterangan = $request->input('keterangan');

            if($jenis_pengeluaran->save()){
                $data = [
                    'message'=>'Sukses Menambahkan data Jenis Pengeluaran'
                ];
                return json_encode($data);
            }
        }
    }

    public function update_jenis_pengeluaran_dialog($id)
    {
        $jenis_pengeluaran = JenisPengeluaran::find($id);

        return $this->responseAsRender('master.jenis_pengeluaran.form_update', ['jenis_pengeluaran'=>$jenis_pengeluaran]);
    }

    public function update_jenis_pengeluaran(Request $request)
    {
        if($request->ajax()){
            $jenis_pengeluaran = JenisPengeluaran::find($request->input('id'));
            $jenis_pengeluaran->kode_jenis = $request->input('kode_jenis');
            $jenis_pengeluaran->nama_jenis = $request->input('nama_jenis');
            $jenis_pengeluaran->keterangan = $request->input('keterangan');

            if($jenis_pengeluaran->save()){
                $data = [
                    'message'=>'Sukses Merubah data Jenis Pengeluaran'
                ];
                return json_encode($data);
            }
        }
    }

    public function hapus_jenis_pengeluaran(Request $request)
    {
        if($request->ajax()){
            $jenis_pengeluaran = JenisPengeluaran::find($request->input('id'));
            if($jenis_pengeluaran->delete()){
                $data = [
                    'message'=>'Sukses Menghapus Data Jenis Pengeluaran'
                ];

                return json_encode($data);
            }
        }
    }

    //end Menu Jenis Pengeluaran
    //Menu Jabatan
    public function index_jabatan()
    {
        return $this->responseAsView('master.jabatan.index_jabatan');
    }

    public function get_data_jabatan(Request $request)
    {
        $data = new Jabatan();
        $data = $data->paginate('5');
        return $this->responseAsJson('master.jabatan.data', ['data'=>$data]);
    }

    public function tambah_jabatan_dialog()
    {
        $kode = Jabatan::generateKodeJenis();
        return $this->responseAsRender('master.jabatan.tambah', ['kode_jabatan'=>$kode]);
    }

    public function tambah_jabatan(Request $request)
    {
        if($request->ajax()){
            $jabatan = new Jabatan();
            $jabatan->kode = $request->input('kode');
            $jabatan->nama = $request->input('nama');
            $jabatan->keterangan = $request->input('keterangan');

            if($jabatan->save()){
                $data = [
                    'message'=>'Sukses Menambahkan Data Jabatan!'
                ];

                return json_encode($data);
            }
        }
    }

    public function update_jabatan_dialog($id)
    {
        $jabatan = Jabatan::find($id);
        return $this->responseAsRender('master.jabatan.update',['jabatan'=>$jabatan]);
    }

    public function update_jabatan(Request $request)
    {
        if($request->ajax()){
            $jabatan = Jabatan::find($request->input('id'));
            $jabatan->kode = $request->input('kode');
            $jabatan->nama = $request->input('nama');
            $jabatan->keterangan = $request->input('keterangan');

            if($jabatan->save()){
                $data = [
                    'message'=>'Sukses Merubah Data Jabatan!'
                ];

                return json_encode($data);
            } 
        }
    }

    public function hapus_jabatan(Request $request)
    {
        if($request->ajax()){
            $jabatan = Jabatan::find($request->input('id'));

            if($jabatan->delete()){
                $data = [
                    'message' => 'Sukses Menghapus Data',
                ];

                return json_encode($data);
            }
        }
    }

    //end Menu Jabatan
    //Menu Tunjangan Jabatan
    public function index_tunjangan()
    {
        return $this->responseAsView('master.tunjangan.index');
    }    

    public function get_data_table(Request $request)
    {
        if($request->ajax()){
            
            $data = TunjanganJabatan::all();
            return $this->responseAsJson('master.tunjangan.data', ['data'=>$data]);            

        }
        
    }

    public function tambah_tunjangan_dialog()
    {
        $jabatan = Jabatan::all();
        return $this->responseAsRender('master.tunjangan.dialog',['data_jabatan'=>$jabatan]);
    }

    public function tambah_tunjangan(Request $request)
    {
        if($request->ajax()){
            $tunjangan = new TunjanganJabatan();
            $tunjangan->id_jabatan = $request->input('id_jabatan');
            $tunjangan->nama = $request->input('nama');
            $tunjangan->jumlah = $request->input('jumlah');
            $tunjangan->keterangan = $request->input('keterangan');

            if($tunjangan->save()){
                $data = [
                    'message'=>'Sukses Menyimpan Data Tunjangan Jabatan'
                ];

                return json_encode($data);
            }
        }
    }

    public function update_tunjangan_dialog($id){
        $tunjangan = TunjanganJabatan::find($id);
        $data_jabatan = Jabatan::all();
        return $this->responseAsRender('master.tunjangan.update', ['tunjangan'=>$tunjangan, 'data_jabatan'=>$data_jabatan]);
    }

    public function update_tunjangan(Request $request){
        if($request->ajax()){
            $tunjangan = TunjanganJabatan::find($request->input('id'));
            $tunjangan->id_jabatan = $request->input('id_jabatan');
            $tunjangan->nama = $request->input('nama');
            $tunjangan->jumlah = $request->input('jumlah');
            $tunjangan->keterangan = $request->input('keterangan');

            if($tunjangan->save()){
                $data = [
                    'message'=>'Sukses Merubah Data Tunjangan Jabatan'
                ];

                return json_encode($data);
            }
        }
    }

    public function hapus_tunjangan(Request $request)
    {
        if($request->ajax()){
            $tunjangan = TunjanganJabatan::find($request->input('id'));
            
            if($tunjangan->delete()){
                $data = [
                    'message'=>'Sukses Menghapus Data Tunjangan Jabatan'
                ];

                return json_encode($data);
            }
        }
    }
    //End Of Menu Tunjangan


    private function responseAsRender($page, $data = [])
    {
        if($data != null){
            return view()->make($page, $data)->render();
        }else{
            return view()->make($page)->render();
        }
    }

    private function responseAsJson($page, $data = [])
    {
        if($data != null){
            return response()->json(view()->make($page, $data)->render());
        }else{
            return response()->json(view()->make($page)->render());
        }

    }

    private function responseAsView($page, $data = [])
    {
        if($data != null){
            return view($page, $data);
        }else{
            return view($page);
        }
    }

    

}
