<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Roles::class);
        $this->call(Users::class);
        $this->call(Alumnos::class);
        $this->call(Medicos::class);
        $this->call(Medicamentos::class);
        $this->call(Consultas::class);
    }
}
