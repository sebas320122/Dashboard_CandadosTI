<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reporte_temp', function (Blueprint $table) {
            $table->id();
            $table->string('Candado');
            $table->string('Area');
            $table->string('Proceso');
            $table->integer('Registros');
            $table->string('Usuario');
            $table->dateTime('Fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_temp');
    }
};
