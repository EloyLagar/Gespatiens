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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('visit_code')->nullable();
            $table->string('number')->nullable();
            $table->date('birth_date');
            $table->string('address');
            $table->string('belongings')->nullable();
            $table->string('phone_number');
            $table->text('extra_info')->nullable();
            $table->string('abuse_substances')->nullable();
            $table->date('exit_date')->nullable();
            $table->date('entry_date');
            $table->string('name');
            $table->string('surname');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
