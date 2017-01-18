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
        if (! Schema::hasTable('data_toko')) {
            Schema::create('data_toko', function (Blueprint $table) {
                $table->increments('id');
                $table->string('kode', 50);
                $table->string('nama', 50);
              
                $table->text('alamat');
                $table->text('kecamatan', 10);
                $table->timestamp('create_date');

            });
        }

        if (! Schema::hasTable('barang')) {
            Schema::create('barang', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama', 50);
                $table->enum('jenis', ['pokok', 'pelengkap']);
                $table->text('keterangan');
                $table->integer('id_toko')->length(10);
                $table->timestamp('create_date');

            });
        }

        if (! Schema::hasTable('etalase')) {
            Schema::create('etalase', function (Blueprint $table) {
                $table->increments('id');
                $table->string('kode', 11);
                $table->string('nama', 20);
                $table->integer('kapasitas');
                $table->integer('id_toko');
                $table->timestamp('create_date');


            });
        }

        if (! Schema::hasTable('karyawan')) {
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
        }

        if (! Schema::hasTable('satuan')) {
            Schema::create('satuan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama', 50);
                $table->string('alias', 10);
                $table->text('keterangan');
            });
        }

        if (! Schema::hasTable('konversi_satuan')) {
            Schema::create('konversi_satuan', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_satuan')->length(10);
                $table->double('nilai_satuan', 15, 2);
                $table->integer('id_konversi')->length(10);
                $table->double('nilai_konversi', 15,2);

            });
        }

        if (! Schema::hasTable('persediaan_barang')) {
            Schema::create('persediaan_barang', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_barang')->length(10);
                $table->double('jumlah', 10, 2);
                $table->integer('id_satuan')->length(10);

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
        Schema::dropIfExists('barang');
        Schema::dropIfExists('data_toko');
        Schema::dropIfExists('etalase');
        Schema::dropIfExists('karyawan');
        Schema::dropIfExists('satuan');
        Schema::dropIfExists('konversi_satuan');
        Schema::dropIfExists('persediaan_barang');
    }
}
