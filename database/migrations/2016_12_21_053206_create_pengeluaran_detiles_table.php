<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengeluaranDetilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran_detile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pengeluaran')->length(10);
            $table->integer('id_barang')->length(10);
            $table->double('kuantitas', 10, 2);
            $table->integer('id_satuan')->length(10);
            $table->double('harga', 10, 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaran_detile');
    }
}
