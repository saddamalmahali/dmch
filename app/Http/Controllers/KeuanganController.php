<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaporanKeuangan;
use App\DataToko;
use App\Penjualan;
use App\Pengeluaran;

class KeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dasboard_keuangan()
    {

    }

    public function index_pengeluaran()
    {
        return $this->responseAsView('laporan.pengeluaran.index');
    }

    public function get_data_harian(Request $request)
    {
        return $this->responseAsJson('laporan.pengeluaran.data_harian');
    }

    public function index_pemasukan()
    {
        $list_toko = DataToko::all();
        return $this->responseAsView('laporan.pemasukan.index', ['list_toko'=>$list_toko]);
    }

    public function get_data_pemasukan_harian(Request $request)
    {
        if($request->ajax())
        {
            $tanggal = date('Y-m-d', strtotime($request->input('tanggal')));
            $toko = $request->input('id_toko');

            $pemasukan = new Penjualan();            
            // $pemasukan->where("tanggal_penjualan", $tanggal);
            // $pemasukan->where('id_toko', '=', $toko);
            $pemasukan = $pemasukan->where("tanggal_penjualan", $tanggal)->where("id_toko", $toko)->first();
            // return json_encode($pemasukan);
            $detile =[];

            if($pemasukan != null){
                 $detile = $pemasukan->list_detile;
            }

            return $this->responseAsJson('laporan.pemasukan.data_harian', ['list_pemasukan'=>$detile]);
        }
    }

    

    public function responseAsView($page, $data =[])
    {
        if($data != null){
            return view($page, $data);
        }else{
            return view($page);
        }
    }

    public function responseAsJson($page, $data=[])
    {
        if($data != null){
            return response()->json(view()->make($page, $data)->render());
        }else{
            return response()->json(view()->make($page)->render());
        }
    }

    public function responseAsRender($page, $data=[])
    {
        if($data != null){
            return view()->make($page, $data)->render();
        }else{
            return view()->make($page)->render();
        }
    }
}
