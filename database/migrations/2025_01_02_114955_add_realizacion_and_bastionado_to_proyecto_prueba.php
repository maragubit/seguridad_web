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
        Schema::table('proyecto_prueba', function (Blueprint $table) {
            // Añadir los nuevos campos sin afectar los existentes
            $table->text('realizacion')->nullable();
            $table->text('bastionado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyecto_prueba', function (Blueprint $table) {
            // Eliminar los campos en caso de reversión
            $table->dropColumn('realizacion');
            $table->dropColumn('bastionado');
        });
    }
};

