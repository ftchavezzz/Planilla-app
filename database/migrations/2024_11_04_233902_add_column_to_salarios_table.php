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
        Schema::table('salarios', function (Blueprint $table) {
            $table->boolean('revisado')->after('pago_realizado')->default(false);
            $table->boolean('procesado')->after('revisado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salarios', function (Blueprint $table) {
            $table->dropColumn('revisado');
            $table->dropColumn('procesado');
        });
    }
};
