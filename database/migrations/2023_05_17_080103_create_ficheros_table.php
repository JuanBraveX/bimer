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
        Schema::defaultStringLength(191);
        Schema::create('ficheroes', function (Blueprint $table) {
            $table->id();
            $table->string('foto_perfil')->nullable()->default(null);
            $table->string('banner')->nullable()->default(null);
            $table->string('foto_1')->nullable()->default(null);
            $table->string('foto_2')->nullable()->default(null);
            $table->string('foto_3')->nullable()->default(null);
            $table->string('foto_4')->nullable()->default(null);
            $table->string('foto_5')->nullable()->default(null);
            $table->string('qr')->nullable()->default(null);
            $table->string('qrImg')->nullable()->default(null);
            $table->string('pdf')->nullable()->default(null);
            $table->string('video_link')->nullable()->default(null);
            $table->timestamps();

            //$table->foreign('id_bimer')->references('id')->on('bimers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficheroes');
    }
};
