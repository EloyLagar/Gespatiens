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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Grupos terapéuticos', 'Habilidades para la vida', 'Escuela de salud', 'Orientación e inserción laboral', 'Taller ocupacional', 'Vídeo fórum', 'Mantenimiento']);
            $table->unsignedBigInteger('activity_id');
            $table->float('utility');
            $table->float('satisfaction');
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
