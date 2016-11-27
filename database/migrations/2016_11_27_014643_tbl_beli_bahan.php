<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblBeliBahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('barang', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('nama', 50);
        //     $table->enum('jenis', ['pokok', 'pelengkap']);
        //     $table->text('keterangan');
        //     $table->integer('id_toko')->length(10)->unsigned();
        //     $table->timestamp('create_date');

        //     $table->foreign('id_toko')->references('id')->on('data_toko');

        // });
        Schema::create('beli_bahan', function(Blueprint $table){
            $table->increments('id');
            $table->string('kode_beli', 20);
            $table->date('tanggal_beli');
            $table->text('keterangan');

        });

        Schema::create('beli_bahan_detile', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_beli')->length(10)->unsigned();
            $table->integer('id_barang')->length(10)->unsigned();
            $table->double('besaran', 8, 2);
            $table->integer('id_satuan')->length(10)->unsigned();
            $table->double('harga', 8, 2);
        });
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
