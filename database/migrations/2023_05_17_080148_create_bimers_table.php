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
        Schema::create('bimers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_suscripcion');
            $table->string('nombre')->nullable()->default(null);
            $table->string('apellido')->nullable()->default(null);
            $table->string('empresa')->nullable()->default(null);
            $table->string('telefono')->nullable()->default(null);
            $table->string('puesto')->nullable()->default(null);
            $table->string('correo')->nullable()->default(null);
            $table->string('ubicacion_text')->nullable()->default(null);
            $table->string('ubicacion_mapa')->nullable()->default(null);
            $table->string('color_texto')->nullable()->default(null);
            $table->string('color_fondo')->nullable()->default(null);
            $table->unsignedBigInteger('id_ficheros');
            $table->unsignedBigInteger('id_redes');
            $table->timestamps();

            $table->foreign('id_suscripcion')->references('id')->on('suscripciones');
            $table->foreign('id_ficheros')->references('id')->on('redes');
            $table->foreign('id_redes')->references('id')->on('ficheroes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bimers');
    }
};
