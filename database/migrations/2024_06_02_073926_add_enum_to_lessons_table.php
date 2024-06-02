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
            $table->enum('type', ['life_skills', 'health_education', 'carrer_help', 'occupational_workshop', 'video_forum', 'maintenance' ]);
            $table->dropColumn('utility');
            $table->dropColumn('satisfaction');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->float('utility');
            $table->float('satisfaction');
            $table->dropColumn('type');
        });
    }
};
