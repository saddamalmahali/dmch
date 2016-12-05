<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataOlah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('olah')) {
            Schema::create('olah', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_toko')->length(10)->unsigned();
                $table->integer('id_karyawan')->length(10)->unsigned();
                $table->string('kode', 50);
                $table->date('tanggal');
                $table->text('keterangan'); 

                $table->foreign('id_toko')->references('id')->on('data_toko');
                $table->foreign('id_karyawan')->references('id')->on('karyawan');

            });
        }

        if (! Schema::hasTable('olah_detile')) {
            Schema::create('olah_detile', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_olah')->length(10)->unsigned();
                $table->integer('id_varian')->length(10)->unsigned();
                $table->double('jumlah', 15, 2);      

                $table->foreign('id_olah')->references('id')->on('olah');   
                $table->foreign('id_varian')->references('id')->on('varian');   
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
