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
        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained();
            $table->string('anio');
            $table->string('mes');
            $table->boolean('quincena');
            $table->date('fecha_inicio');
            $table->date('fecha_corte');
            $table->float('horas_trabajadas');
            $table->decimal('salario_ordinario', $precision = 8, $scale = 2);
            $table->decimal('pago_bruto', $precision = 8, $scale = 2);
            $table->decimal('pago_realizado', $precision = 8, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salarios');
    }
};
