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
        Schema::create('empleado_contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('contrato_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('vigente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_contratos');
    }
};
