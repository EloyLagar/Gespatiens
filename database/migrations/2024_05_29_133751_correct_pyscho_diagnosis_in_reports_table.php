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
        Schema::table('reports', function (Blueprint $table) {
            $table->renameColumn('pyscho_diagnosis', 'psycho_diagnosis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->renameColumn('psycho_diagnosis', 'pyscho_diagnosis');
        });
    }
};
