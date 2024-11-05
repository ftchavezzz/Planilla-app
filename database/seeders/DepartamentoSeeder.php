<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departamentos')->insert([
            ['id' => '1', 'nombre' => 'Recursos Humanos'],
            ['id' => '2', 'nombre' => 'Marketing'],
            ['id' => '3', 'nombre' => 'Finanzas'],
            ['id' => '4', 'nombre' => 'Tecnología de la Información'],
            ['id' => '5', 'nombre' => 'Ventas'],
            ['id' => '6', 'nombre' => 'Operaciones']
        ]);
    }
}
