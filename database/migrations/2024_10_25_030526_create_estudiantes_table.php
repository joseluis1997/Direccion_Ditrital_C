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

        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unidad_educativa_id')->constrained('unidades_ed')->onDelete('cascade'); // Relaciona con la tabla 'unidades_ed'
            $table->string('nivel'); // Puede ser 'inicial', 'primaria', 'secundaria'
            $table->string('grado'); // Grado (por ejemplo, '1', '2', '3', etc.)
            $table->string('paralelo'); // Paralelo (por ejemplo, 'A', 'B', etc.)
            $table->integer('cantidad_hombres')->default(0); // Cantidad de hombres, con valor por defecto 0
            $table->integer('cantidad_mujeres')->default(0); // Cantidad de mujeres, con valor por defecto 0
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
