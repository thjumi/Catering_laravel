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
        Schema::table('users', function (Blueprint $table) {
            $table->date('fechaRegistro')->nullable(); // Cambiado a tipo fecha
            $table->string('role')->default('empleado'); // Rol por defecto: empleado
            $table->string('subrole')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['fechaRegistro', 'rol', 'subrole']); // Elimina también subrole
        });
    }
};
