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
            ['id' => '1', 'nombre' => 'Pago de Vacaciones', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '2', 'nombre' => 'Pago de indemnizacion', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '3', 'nombre' => 'Pago de Aguinaldo', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '4', 'nombre' => 'Pago de Ajuste Salarial', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '5', 'nombre' => 'Pago de Viaticos', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '6', 'nombre' => 'Pago de Bonos', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '7', 'nombre' => 'Pago de Comisiones', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '8', 'nombre' => 'Pago de Adelanto Salarial', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
            ['id' => '9', 'nombre' => 'Pago de Prestamo', 'descripcion' => 'Beneficio que depende del tipo de contrato'],
        ]);
    }
}
