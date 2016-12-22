<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function get_data_chart_penjualan(Request $request)
    {
        if($request->ajax()){
            $penjualan = new Penjualan();
            $data = array();
            //array_push($data, ['Bulan', 'Pendapatan']);
            for ($i=0; $i <= 11; $i++) { 
                $detile = $penjualan->getDataChartPerTahun(date('Y'), $i+1);
                $jumlah_barang = 0;
                $date = 0;
                foreach ($detile as $d) {
                    $jumlah_barang = $jumlah_barang+$d->list_detile->sum('jumlah');
                }
                // $data_sub = array();
                // switch ($i) {
                //     case 0:
                //         $data_sub = ['Januari', $jumlah_barang];
                //         break;
                //     case 1 :
                //         $data_sub = ['Februari', $jumlah_barang];
                //         break;

                //     case 2 :
                //         $data_sub = ['Maret', $jumlah_barang];
                //         break;
                //     case 3 :
                //         $data_sub = ['April', $jumlah_barang];
                //         break;
                //     case 4 :
                //         $data_sub = ['Mei', $jumlah_barang];
                //         break;
                //     case 5 :
                //         $data_sub = ['Juni', $jumlah_barang];
                //         break;
                //     case 6 :
                //         $data_sub = ['Juli', $jumlah_barang];
                //         break;
                //     case 7 :
                //         $data_sub = ['Agustus', $jumlah_barang];
                //         break;
                //     case 8 :
                //         $data_sub = ['September', $jumlah_barang];
                //         break;
                //     case 9 :
                //         $data_sub = ['Oktober', $jumlah_barang];
                //         break;
                //     case 10 :
                //         $data_sub = ['November', $jumlah_barang];
                //         break;
                //     case 11 :
                //         $data_sub = ['Desember', $jumlah_barang];
                //         break;

                //     default:
                //         $data_sub = [];
                //         break;
                // }
                $bulan = "2016-".($i+1)."-01";
                $data2 = ['bulan'=>date('F', strtotime($bulan)),'jumlah'=> $jumlah_barang];
                array_push($data,$data2);
            }
            
            
            echo json_encode($data);
        }
    }

    public function test_template(){
        return view('layouts.main');
    }
}
