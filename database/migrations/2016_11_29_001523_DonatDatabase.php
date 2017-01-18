<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DonatDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('jenis_donat')) {
            Schema::create('jenis_donat', function (Blueprint $table) {
                $table->increments('id');
                $table->string('kode', 50);
                $table->string('nama')->length(50);
                $table->text('keterangan');              
            });
        }

        if (! Schema::hasTable('varian')) {
            Schema::create('varian', function (Blueprint $table) {
                $table->increments('id');
                $table->string('kode')->length(20);
                $table->integer('id_jenis')->length(10);

                $table->string('rasa');             
            });
        }

        if (! Schema::hasTable('komposisi')) {
            Schema::create('komposisi', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_varian')->length(10);
                $table->integer('id_bahan')->length(10);
              
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
        Schema::dropIfExists('jenis_donat');
        Schema::dropIfExists('varian');
        Schema::dropIfExists('komposisi');
    }
}
