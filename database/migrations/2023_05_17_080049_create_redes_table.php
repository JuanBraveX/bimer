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
        Schema::create('redes', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable()->default(null);
            $table->string('linkedin')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('youtube')->nullable()->default(null);
            $table->string('tiktok')->nullable()->default(null);
            $table->string('whatsapp')->nullable()->default(null);
            $table->string('indeed')->nullable()->default(null);
            $table->string('instagram')->nullable()->default(null);
            $table->string('pagina_web')->nullable()->default(null);
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
        Schema::dropIfExists('redes');
    }
};
