<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->float('mark')->nullable();
            $table->date('date')->nullable(false);
            $table->enum('lesson_type', ['Grupos terapéuticos', 'Habilidades para la vida', 'Escuela de salud', 'Orientación e inserción laboral', 'Taller ocupacional', 'Vídeo fórum', 'Mantenimiento']);
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
