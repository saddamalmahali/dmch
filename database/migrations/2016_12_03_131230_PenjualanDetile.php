<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenjualanDetile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('penjualan_detile')) {
            Schema::create('penjualan_detile', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_penjualan')->length(10);
                $table->integer('id_barang')->length(10);
                $table->integer('banyak');
                $table->integer('id_satuan')->length(10);
                $table->double('jumlah', 10, 2);
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
        Schema::dropIfExists('penjualan_detile');
    }
}
