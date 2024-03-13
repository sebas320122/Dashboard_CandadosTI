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
        Schema::create('candados', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('Columna');
            $table->string('Nombre');
            $table->string('Area');   
            $table->string('Proceso');   
            $table->string('Sistema');    
            $table->tinyText('Descripcion');       
            $table->mediumText('Consulta');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candados');
    }
};
