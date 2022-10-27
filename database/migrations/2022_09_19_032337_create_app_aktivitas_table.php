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
        Schema::create('app_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('reminder')->nullable();
            $table->string('ulangi');
            $table->string('todate')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('prioritas');
            $table->longText('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_aktivitas');
    }
};
