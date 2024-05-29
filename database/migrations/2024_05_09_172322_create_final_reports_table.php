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
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->text('health_situation_at_discharge')->nullable();
            $table->text('other_medical_attention')->nullable();

            $table->text('psycho_situation_at_discharge')->nullable();
            $table->text('psycho_outgoings_value')->nullable();

            $table->text('educative_outgoings_value')->nullable();

            $table->text('familiar_situation_at_discharge')->nullable();

            $table->text('discharge_fundamentals')->nullable();
            $table->text('after_discharge_objectives')->nullable();

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
