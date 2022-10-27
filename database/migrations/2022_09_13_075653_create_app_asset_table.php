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
            $table->string('as_mla_id');
            $table->string('as_mca_id');
            $table->date('as_tanggal');
            $table->string('as_kode_asset');
            $table->integer('as_harga');
            $table->integer('as_umur_manfaat');
            $table->integer('as_jumlah');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
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
