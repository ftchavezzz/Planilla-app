<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeydescuentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('leydescuentos')->insert([
            ['id' => '1', 'nombre' => 'Descuento de AFP', 'descripcion' => 'Descuento de administracion de fondo de pensiones', 'porcentaje' => 0.0725],
            ['id' => '2', 'nombre' => 'Descuento del ISSS', 'descripcion' => 'Descuento del seguro social', 'porcentaje' => 0.03],
            ['id' => '3', 'nombre' => 'Descuento de Renta', 'descripcion' => 'Descuento a pagar al estado el fruto de tu trabajo', 'porcentaje' => 0.0]
        ]);
    }
}
