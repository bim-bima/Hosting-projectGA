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
        Schema::create('m_vendor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mv_nama_vendor');
            $table->string('mv_lokasi');
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
        Schema::dropIfExists('m_vendor');
    }
};
