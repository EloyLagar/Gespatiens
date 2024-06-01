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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->boolean('state')->default(false);
            $table->string('request_number')->nullable();

            $table->text('social_familiar_situation')->nullable();
            $table->text('laboral_educative_economical_situation')->nullable();
            $table->text('judicial_situation')->nullable();
            $table->text('social_evo_and_objectives')->nullable();
            $table->text('social_diagnosis')->nullable();

            $table->text('health_at_entry')->nullable();
            $table->text('about_toxicology')->nullable();
            $table->text('toxicological_controls')->nullable();
            $table->text('health_diagnosis')->nullable();
            $table->text('physical_health_condition')->nullable();

            $table->text('psycho_entry_valoration')->nullable();
            $table->text('psycho_evaluation_with_instruments')->nullable();
            $table->string('about_motivation')->nullable();
            $table->text('psycho_interventions')->nullable();
            $table->text('psycho_diagnosis')->nullable();

            $table->text('habit_adaptation')->nullable();
            $table->text('activities_adaptation')->nullable();
            $table->text('normativity_adaptation')->nullable();
            $table->text('workout_adaptation')->nullable();
            $table->text('leisure_adaptation')->nullable();
            $table->text('partners_relationship')->nullable();
            $table->text('therapeutic_crew_relationship')->nullable();

            $table->text('reference_familiars')->nullable();
            $table->text('familiar_evo_and_realtionship')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
