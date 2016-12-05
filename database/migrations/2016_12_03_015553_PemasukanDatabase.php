<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PemasukanDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('daftar_harga_penjualan')) {
            Schema::create('daftar_harga_penjualan', function (Blueprint $table) {
                $table->increments('id');
                $table->enum('jenis', ['pokok', 'umum']);
                $table->integer('id_jenis')->length(10)->unsigned();
                $table->integer('id_satuan')->length(10)->unsigned();
                $table->double('harga', 8, 2);

                $table->foreign('id_jenis')->references('id')->on('jenis_donat');
              
            });
        }

        if (! Schema::hasTable('penjualan')) {
            Schema::create('penjualan', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_toko')->length(10)->unsigned();
                $table->string('kode_toko', 20);
                $table->date('tanggal_penjualan');
                $table->timestamps();

                $table->foreign('id_toko')->references('id')->on('data_toko');
              
            });
        }

        

        // if (! Schema::hasTable('penjualan_detile')) {
        //     Schema::create('penjualan_detile', function (Blueprint $table) {
        //         $table->increments('id');                
        //         $table->integer('id_penjualan')->length(10)->unsigned();
        //         $table->integer('id_daftar')->length(10)->unsigned();
        //         $table->integer('banyak', 10);
        //         $table->integer('id_satuan')->length(10)->unsigned();
        //         $table->text('keterangan')->nullable();

        //         $table->foreign('id_penjualn')->references('id')->on('penjualan');
        //         $table->foreign('id_satuan')->references('id')->on('satuan');
        //         $table->foreign('id_daftar')->references('id')->on('daftar_harga_penjualan');
              
        //     });
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_harga_penjualan');
        Schema::dropIfExists('penjualan');
        
    }
}
