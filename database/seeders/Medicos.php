<?php

namespace Database\Seeders;

use App\Models\Medico;
use Illuminate\Database\Seeder;

class Medicos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medico::create([
            'cedula' => 12345678,
            'nombre' => 'medico',
            'campus' => 1
        ]);

        Medico::factory()->count(5)->create();
    }
}
