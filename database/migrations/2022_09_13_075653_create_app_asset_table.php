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
        Schema::create('app_asset', function (Blueprint $table) {
            $table->increments('id');
            $table->string('as_nama_asset');
            $table->BigInteger('as_mla_id')->unsigned();
            $table->integer('as_tahun_kepemilikan');
            $table->string('as_kode_asset');
            $table->integer('as_harga');
            $table->integer('as_nilai_residu');
            $table->integer('as_umur_manfaat');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            // $table->foreign('as_mla_id')->references('id')->on('m_lokasi_asset');
            // $table->foreign('as_mla_id')->references('mk_id')->on('m_lokasi_asset');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_asset');
    }
};
