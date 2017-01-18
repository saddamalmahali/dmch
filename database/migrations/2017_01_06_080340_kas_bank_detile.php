<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KasBankDetile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_bank_detile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kas_bank')->length(10);
            $table->integer('id_akun')->length(10);
            
            $table->double('debet', 12, 2);
            $table->double('kredit', 12, 2);
            $table->text('deskripsi')->nullable();
            

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
        Schema::dropIfExists('kas_bank_detile');
    }
}
