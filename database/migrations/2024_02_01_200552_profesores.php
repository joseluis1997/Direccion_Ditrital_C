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
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('ci');
            $table->string('rda');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('celular');
            $table->string('correo');
            $table->string('pdf_path')->nullable();
            $table->foreignId('unidad_educativa_id')->constrained('unidades_ed')->onDelete('cascade'); // Relación con la tabla de unidades educativas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
