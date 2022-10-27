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
        Schema::create('app_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ar_request');
            $table->string('ar_perequest');
            $table->string('ar_kebutuhan');
            $table->string('ar_tanggal_estimasi');
            $table->string('ar_catatan');
            $table->date('created_at',0)->useCurrent();
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
        Schema::dropIfExists('app_request');
    }
};
