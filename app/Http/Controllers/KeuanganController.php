<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
