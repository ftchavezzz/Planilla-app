<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pagos')->insert([
            ['id' => '1', 'nombre' => 'Pago por ajuste salarial', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '2', 'nombre' => 'Pago por horas extra', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '3', 'nombre' => 'Pago por bono desempeño', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '4', 'nombre' => 'Pago de comision por cumplimiento de Meta', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '5', 'nombre' => 'Pago de aguinaldo', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '6', 'nombre' => 'Pago de vacaciones', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '7', 'nombre' => 'Pago por indemnizacion', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
        ]);
    }
}
