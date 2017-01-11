<?php

use Illuminate\Database\Seeder;
use App\KategoriAkun;
class KategoriAkunSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aktiva = new KategoriAkun();
        $aktiva->kode = '01';
        $aktiva->nama = 'AKTIVA';
        
        $aktiva->save();

        $kewajiban = new KategoriAkun();
        $kewajiban->kode = '02';
        $kewajiban->nama = 'KEWAJIBAN';
        $kewajiban->save();
        
        $ekuitas = new KategoriAkun();
        $ekuitas->kode = '03';
        $ekuitas->nama = 'EKUITAS';
        $ekuitas->save();

        $pendapatan_usaha = new KategoriAkun();
        $pendapatan_usaha->kode = '04';
        $pendapatan_usaha->nama = 'PENDAPATAN USAHA';
        $pendapatan_usaha->save();

        $hpp = new KategoriAkun();
        $hpp->kode = '05';
        $hpp->nama = 'HARGA POKOK PENJUALAN';
        $hpp->save();

        $beban_usaha = new KategoriAkun();
        $beban_usaha->kode = '06';
        $beban_usaha->nama = 'BEBAN USAHA';
        $beban_usaha->save();

        $penghasilan_lain = new KategoriAkun();
        $penghasilan_lain->kode = '07';
        $penghasilan_lain->nama = 'PENGHASILAN LAIN-LAIN';
        $penghasilan_lain->save();

        $beban_lain = new KategoriAkun();
        $beban_lain->kode = '08';
        $beban_lain->nama = 'BEBAN LAIN-LAIN';
        $beban_lain->save();
    }
}
