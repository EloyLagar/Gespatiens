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
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');

            $table->text('program_duration_forecast')->nullable();
            $table->string('nip')->nullable();

            $table->text('health_objectives')->nullable();
            $table->text('psycho_objectives')->nullable();
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
