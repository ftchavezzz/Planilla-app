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
            ['id' => '1', 'tipo_contrato' => 'Contrato a Plazo Fijo', 'porcentaje_salario_hora' => NULL],
            ['id' => '2', 'tipo_contrato' => 'Contrato Indefinido', 'porcentaje_salario_hora' => NULL],
            ['id' => '3', 'tipo_contrato' => 'Contrato por Servicios Profesionales', 'porcentaje_salario_hora' => NULL],
            ['id' => '4', 'tipo_contrato' => 'Contrato de Prueba', 'porcentaje_salario_hora' => 0.8],
            ['id' => '5', 'tipo_contrato' => 'Contrato por Poyectos', 'porcentaje_salario_hora' => NULL],
            ['id' => '6', 'tipo_contrato' => 'Contrato de Trabajo Temporal', 'porcentaje_salario_hora' => NULL],
            ['id' => '7', 'tipo_contrato' => 'Contrato de Aprendizaje', 'porcentaje_salario_hora' => NULL],
            ['id' => '8', 'tipo_contrato' => 'Contrato a Tiempo Parcial', 'porcentaje_salario_hora' => 1.0]
        ]);
    }
}
