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
        Schema::create('app_pengajuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ap_nama_pengajuan');
            $table->string('ap_jenis_pengajuan');
            $table->unsignedInteger('ap_mv_id');
            $table->integer('ap_biaya');
            $table->string('ap_catatan');
            $table->date('ap_tanggal_pengadaan');
            $table->unsignedInteger('ap_mp_id');
            $table->date('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('ap_mp_id')->references('id')->on('m_pic');
            $table->foreign('ap_mv_id')->references('id')->on('m_vendor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_pengajuan');
    }
};
