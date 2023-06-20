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
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_plan');
            $table->date('inicio_en')->nullable(false);
            $table->date('finaliza_en')->nullable(false);
            $table->date('cancelo_en')->nullable(true);
            $table->boolean('renovacion')->nullable(false)->default(true);
            $table->date('renovacion_cancelada')->nullable(true);
            $table->integer('cantidad')->nullable(false);
            $table->decimal('precio_neto', 6, 2)->nullable(false);
            $table->decimal('descuento', 2, 2)->nullable(false);
            $table->decimal('precio_real', 6, 2)->nullable(false);
            $table->boolean('suspendida')->nullable(false)->default(true);
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_plan')->references('id')->on('planes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suscripciones');
    }
};
