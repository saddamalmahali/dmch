<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableSatuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('satuan', function (Blueprint $table) {
            $table->enum('jenis', ['umum', 'jenis_penjualan']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('satuan', function (Blueprint $table) {
            $table->dropColumn('jenis');
        });
         
    }
}
