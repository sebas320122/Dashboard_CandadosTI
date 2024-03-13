<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->integer('Candados');
            $table->integer('Registros');
            $table->string('Usuario');
            $table->dateTime('Fecha');
            $table->boolean('Valido');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
