<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kendaraan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mk_nama_kendaraan');
            $table->string('mk_no_polisi');
            $table->string('mk_jenis');
            $table->string('mk_merk');
            $table->string('mk_warna');
            $table->string('mk_bahan_bakar')->nullable();
            $table->string('mk_kilometer')->nullable();
            $table->string('mk_kondisi_lain')->nullable();
            $table->timestamp('created_at',0)->useCurrent();
            $table->timestamp('updated_at',0)->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_kendaraan');
    }
};
