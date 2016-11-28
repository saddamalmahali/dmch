<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionalTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('harga_bahan')) {
            Schema::create('harga_bahan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('kode', 50);
                $table->integer('id_barang')->length(10)->unique()->unsigned();
                $table->integer('id_satuan')->length(10)->unsigned();
                $table->double('harga', 15, 2);
                $table->text('keterangan');
                $table->foreign('id_barang')->references('id')->on('barang');
                $table->foreign('id_satuan')->references('id')->on('satuan');
              
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
        Schema::dropIfExists('harga_bahan');
    }
}
