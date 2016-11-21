<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_toko', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode', 50);
            $table->string('nama', 50);
          
            $table->text('alamat');
            $table->text('kecamatan', 10);
            $table->timestamp('create_date');

        });
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->enum('jenis', ['pokok', 'pelengkap']);
            $table->text('keterangan');
            $table->integer('id_toko')->length(10)->unsigned();;
            $table->timestamp('create_date');

            $table->foreign('id_toko')->references('id')->on('data_toko');

        });

        Schema::create('etalase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode', 11);
            $table->string('nama', 20);
            $table->integer('kapasitas');
            $table->integer('id_toko')->length(10)->unsigned();;
            $table->timestamp('create_date');

            $table->foreign('id_toko')->references('id')->on('data_toko');

        });

        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50);
            $table->enum('jenis_kelamin', ['l', 'p'])->default('l');
            $table->string('tempat_lahir', 30);
            $table->dateTime('tanggal_lahir');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->timestamp('create_date');


        });

        Schema::create('satuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->string('alias', 10);
            $table->text('keterangan');
        });

        Schema::create('konversi_satuan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_satuan')->length(10)->unsigned();;
            $table->double('nilai_satuan', 15, 2);
            $table->integer('id_konversi')->length(10)->unsigned();;
            $table->double('nilai_konversi', 15,2);

            $table->foreign('id_satuan')->references('id')->on('satuan');
            $table->foreign('id_konversi')->references('id')->on('satuan');
        });

        Schema::create('persediaan_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_barang')->length(10)->unsigned();;
            $table->double('jumlah', 10, 2);
            $table->integer('id_satuan')->length(10)->unsigned();;

            $table->foreign('id_barang')->references('id')->on('barang');
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
        Schema::dropIfExists('barangs');
    }
}
