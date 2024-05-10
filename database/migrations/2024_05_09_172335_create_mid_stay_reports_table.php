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
        Schema::create('mid_stay_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id')->unique();
            $table->text('estimated_duration')->nullable();
            $table->text('educational_objectives')->nullable();
            $table->text('start_toxicological_state')->nullable();
            $table->text('psycho_intervention')->nullable();
            $table->text('medical_evolution_valoration')->nullable();
            $table->text('social_objectives')->nullable();
            $table->text('psycho_objectives')->nullable();
            $table->text('health_objectives')->nullable();
            $table->foreign('report_id')->references('id')->on('reports');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mid_stay_reports');
    }
};
