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
        Schema::create('app_kendaraan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ak_mk_id');
            // $table->unsignedInteger('ak_mk_id');
            $table->string('ak_pengguna');
            $table->date('ak_tanggal_mulai');
            $table->time('ak_jam');
            $table->date('ak_tanggal_selesai');
            $table->time('ak_jam_selesai');
            // $table->string('ak_mp_id');
            // $table->unsignedInteger('ak_mp_id');
            $table->string('ak_lokasi_tujuan');
            $table->string('ak_tujuan_pemakaian');
            $table->timestamp('created_at',0)->useCurrent();
            $table->timestamp('updated_at',0)->nullable();

            // $table->foreign('ak_mk_id')->references('id')->on('m_kendaraan');
            // $table->foreign('ak_mp_id')->references('id')->on('m_pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_kendaraan');
    }
};
