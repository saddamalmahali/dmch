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
        if (! Schema::hasTable('beli_bahan')) {
            Schema::create('beli_bahan', function(Blueprint $table){
                $table->increments('id');
                $table->integer('id_toko')->length(10);
                $table->string('kode_beli', 20);
                $table->date('tanggal_beli');
                $table->text('keterangan');


            });
        }
        
        if (! Schema::hasTable('beli_bahan_detile')) {
            Schema::create('beli_bahan_detile', function(Blueprint $table){
                $table->increments('id');
                $table->integer('id_beli')->length(10);
                $table->integer('id_barang')->length(10);
                $table->double('besaran', 8, 2);
                $table->integer('id_satuan')->length(10);
                $table->double('harga', 8, 2);
            });
        }

        if (! Schema::hasTable('harga_bahan')) {
            Schema::create('harga_bahan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('kode', 50);
                $table->integer('id_barang')->length(10)->unique();
                $table->integer('id_satuan')->length(10);
                $table->double('harga', 15, 2);
                $table->text('keterangan');
              
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
        Schema::dropIfExists('beli_bahan');
        Schema::dropIfExists('beli_bahan_detile');
        Schema::dropIfExists('harga_bahan');
    }
}
