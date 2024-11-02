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
        Schema::create('salario_leydescuentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leydescuento_id')->constrained();
            $table->foreignId('salario_id')->constrained();
            $table->decimal('monto', $precision = 8, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salario_leydescuentos');
    }
};
