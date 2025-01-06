<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('proyecto_prueba', function (Blueprint $table) {
            $table->text('observación')->nullable()->change(); // Hacer nullable
        });
    }

    public function down(): void
    {
        Schema::table('proyecto_prueba', function (Blueprint $table) {
            $table->text('observación')->nullable(false)->change(); // Revertir a no nullable
        });
    }
};
