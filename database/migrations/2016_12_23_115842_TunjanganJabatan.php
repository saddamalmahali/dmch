<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TunjanganJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangan_jabatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jabatan')->length(10)->unsigned();
            $table->string('nama');
            $table->double('jumlah', 10, 2);
            $table->text('keterangan')->nullable();

            $table->foreign('id_jabatan')->references('id')->on('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tunjangan_jabatan');
    }
}
