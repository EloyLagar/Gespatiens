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
        Schema::table('lessons', function (Blueprint $table) {
            $table->enum('type', [ 'Habilidades para la vida', 'Escuela de salud', 'Orientación e inserción laboral', 'Taller ocupacional', 'Vídeo fórum', 'Mantenimiento'])->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->enum('type', ['Grupos terapéuticos', 'Habilidades para la vida', 'Escuela de salud', 'Orientación e inserción laboral', 'Taller ocupacional', 'Vídeo fórum', 'Mantenimiento'])->change();

        });
    }
};
