<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriAkun;
use App\Akun;

class AkunController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index_akun()
    {
        $kategori = KategoriAkun::all();
        return $this->responseAsView('akuntansi.akun.index', ['data_kategori'=>$kategori]);
    }

    public function tambah_akun()
    {
        $kategori = KategoriAkun::all();
        $data_akun = Akun::whereNull('header')->get();

        return $this->responseAsView('akuntansi.akun.tambah', ['data_akun'=>$data_akun,'data_kategori'=>$kategori]);
    }

    public function save_akun(Request $request)
    {
        
        $akun = new Akun();
        $akun->id_kategori = $request->input('id_kategori');
        
        
        $kategori = KategoriAkun::find($request->input('id_kategori'));
        $header = Akun::find($request->input('header'));
        $kode_akun = '';
        if($header != null){
            $header_kode = substr($header->kode, 3,2);
            $kode_akun = $kategori->kode.'.'.$header_kode.'.'.$request->input('kode');
            $akun->header = $header->id;
        }else{
            $kode_akun = $kategori->kode.'.'.$request->input('kode');
        }
        
        $akun->kode = $kode_akun;
        $akun->nama = $request->input('nama');
        $akun->posisi = $request->input('posisi');
        $akun->deskripsi = $request->input('deskripsi');


        if($akun->save()){
            return redirect('/index_akun');

        }
    }

    private function responseAsView($page, $data=[])
    {
        if($data != null){
            return view($page, $data);
        }else{
            return view($page);
        }
    }

    private function responseAsRender($page, $data =[])
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
}
