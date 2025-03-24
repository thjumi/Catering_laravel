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
        Schema::create('insumo_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos');
            $table->foreignId('insumo_id')->constrained('insumos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumo_eventos');
    }
};
