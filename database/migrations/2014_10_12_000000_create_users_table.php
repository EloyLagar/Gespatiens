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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('speciality', ['educator', 'worker', 'medical', 'psychologis', 'admin']);
            $table->string('password');
            $table->string('email')->unique();
            $table->string('signature')->nullable();
            $table->bigInteger('phone_number')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('token')->nullable()->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
