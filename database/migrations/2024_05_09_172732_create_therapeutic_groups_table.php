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
        Schema::create('therapeutic_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id')->unique();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->string('group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapeutic_groups');
    }
};
