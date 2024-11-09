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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('puesto_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre');
            $table->string('dui');
            $table->string('telefono_fijo')->nullable($value = true);
            $table->string('telefono_mobile');
            $table->date('fecha_ingreso');
            $table->date('fecha_nacimiento');
            $table->boolean('activo');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
