<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(DepartamentoSeeder::class);
        $this->call(PuestoSeeder::class);
        $this->call(ContratoSeeder::class);
        $this->call(DescuentoSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(LeydescuentoSeeder::class);
        $this->call(PagoSeeder::class);
    }
}
