<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;

class KasBankController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index_kas()
    {
        return $this->responseAsView('akuntansi.kas_bank.index');
    }

    public function terima_kas()
    {
        $akun = Akun::whereNotNull('header')->where('header', '<', '3')->orderBy('kode', 'asc')->get();
        $akun_detile = Akun::whereNotNull('header')->orderBy('kode', 'asc')->get();
        return $this->responseAsView('akuntansi.kas_bank.terima_kas', ['data_akun'=> $akun, 'data_akun_detile'=>$akun_detile]);
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
