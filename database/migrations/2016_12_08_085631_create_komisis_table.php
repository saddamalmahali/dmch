<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis')->length(10)->unsigned();
            $table->integer('id_satuan')->length(10)->unsigned();
            $table->double('komisi', 10, 2);
            $table->text('keterangan')->nullable();

            $table->foreign('id_jenis')->references('id')->on('jenis_donat');
            $table->foreign('id_satuan')->references('id')->on('satuan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komisi');
    }
}
