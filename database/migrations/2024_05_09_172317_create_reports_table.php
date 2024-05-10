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
            $table->text('psycho_diagnosis')->nullable();
            $table->integer('nip')->nullable();
            $table->text('psycho_evaluation')->nullable();
            $table->text('partners_relationships')->nullable();
            $table->text('family_relationship')->nullable();
            $table->text('about_families')->nullable();
            $table->text('dealing_with_employees')->nullable();
            $table->text('social_diagnosis')->nullable();
            $table->text('social_familiar_situation')->nullable();
            $table->text('judicial_situation')->nullable();
            $table->text('toxicological_controls')->nullable();
            $table->text('adaptation_and_implication')->nullable();
            $table->text('life_general_situation')->nullable();
            $table->text('motivation')->nullable();
            $table->string('request_number')->nullable();
            $table->date('date')->nullable();
            $table->text('initial_health')->nullable();
            $table->text('psychological')->nullable();
            $table->text('evaluation')->nullable();
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
