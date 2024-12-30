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
        Schema::create('proyecto_prueba', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_id');
            $table->foreignId('prueba_id');
            $table->boolean('superada')->default(false);
            $table->text('observación');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_prueba');
    }
};
