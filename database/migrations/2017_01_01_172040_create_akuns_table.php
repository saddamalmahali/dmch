<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->length(10)->unsigned();
            $table->integer('header')->length(10)->nullable();
            $table->string('kode');
            $table->string('nama');
            $table->enum('posisi', ['debit', 'kredit']);
            $table->string('deskripsi')->nullable();

            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategori_akun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akun');
    }
}
