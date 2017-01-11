<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_transaksi')->length(50)->nullable();
            $table->date('tanggal');            
            $table->text('memo');
            $table->string('lampiran')->length(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_bank');
    }
}
