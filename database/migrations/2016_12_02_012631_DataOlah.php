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
                $table->integer('id_toko')->length(10);
                $table->integer('id_karyawan')->length(10);
                $table->string('kode', 50);
                $table->date('tanggal');
                $table->text('keterangan'); 

            });
        }

        if (! Schema::hasTable('olah_detile')) {
            Schema::create('olah_detile', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_olah')->length(10);
                $table->integer('id_varian')->length(10);
                $table->double('jumlah', 15, 2);      

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
        Schema::dropIfExists('olah');
        Schema::dropIfExists('olah_detile');
    }
}
