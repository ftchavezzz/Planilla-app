<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contratos')->insert([
            ['id' => '1', 'tipo_contrato' => 'Contrato a Plazo Fijo', 'pago_por_hora' => false],
            ['id' => '2', 'tipo_contrato' => 'Contrato Indefinido', 'pago_por_hora' => false],
            ['id' => '3', 'tipo_contrato' => 'Contrato por Servicios Profesionales', 'pago_por_hora' => true],
            ['id' => '4', 'tipo_contrato' => 'Contrato de Prueba', 'pago_por_hora' => false],
            ['id' => '5', 'tipo_contrato' => 'Contrato por Poyectos', 'pago_por_hora' => false],
            ['id' => '6', 'tipo_contrato' => 'Contrato de Trabajo Temporal', 'pago_por_hora' => true],
            ['id' => '7', 'tipo_contrato' => 'Contrato de Aprendizaje', 'pago_por_hora' => true],
            ['id' => '8', 'tipo_contrato' => 'Contrato a Tiempo Parcial', 'pago_por_hora' => true]
        ]);
    }
}
