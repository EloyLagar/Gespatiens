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
        Schema::table('evaluations', function (Blueprint $table) {
            $table->enum('lesson_type', ['therapeutic_groups', 'life_skills', 'health_education', 'carrer_help', 'occupational_workshop', 'video_forum', 'maintenance' ])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->enum('lesson_type', ['Grupos terapéuticos', 'Habilidades para la vida', 'Escuela de salud', 'Orientación e inserción laboral', 'Taller ocupacional', 'Vídeo fórum', 'Mantenimiento'])->change();
        });

    }
};
