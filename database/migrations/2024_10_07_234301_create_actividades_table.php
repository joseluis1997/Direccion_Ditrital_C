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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id(); // Campo ID autoincremental
            $table->string('nombreAct'); // Nombre de la actividad
            $table->date('fechaI'); // Fecha de inicio
            $table->time('horaI'); // Hora de inicio
            $table->date('fechaF'); // Fecha de fin
            $table->time('horaF'); // Hora de fin
            $table->text('descripcionA'); // Descripción de la actividad
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
