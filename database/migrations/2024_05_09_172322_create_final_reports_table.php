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
        Schema::create('final_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id')->unique();
            $table->text('educational_therapeutic_outgoings')->nullable()->nullable();
            $table->date('leaving_date')->nullable();
            $table->text('leaving_reason')->nullable();
            $table->text('psycho_therapeutic_outgoings')->nullable();
            $table->text('psycho_intervention_objectives')->nullable();
            $table->text('discharge_psycho_situation')->nullable();
            $table->text('health_evolution')->nullable();
            $table->text('evolution_and_objectives_achieved')->nullable();
            $table->text('discharge_medical_situation')->nullable();
            $table->text('other_medical_care')->nullable();
            $table->text('after_program_objectives')->nullable();
            $table->text('toxicological_summary')->nullable();
            $table->text('discharge_family_situation')->nullable();
            $table->foreign('report_id')->references('id')->on('reports');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_reports');
    }
};
