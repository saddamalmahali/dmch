<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_toko')->length(10)->unsigned();
            $table->integer('id_jenis')->length(10)->unsigned();
            $table->enum('jenis_pembayaran', ['tunai', 'bank']);
            $table->string('kode')->length(20);
            $table->date('tanggal');
            $table->string('file')->length(100)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_toko')->references('id')->on('data_toko');
            $table->foreign('id_jenis')->references('id')->on('jenis_pengeluaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
}
