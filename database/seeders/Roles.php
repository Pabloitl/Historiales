<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Medico']);
        Role::create(['name' => 'Administrador']);

        Permission::create(['name' => 'manipular alumnos'])->syncRoles(['Administrador', 'Medico']);
        Permission::create(['name' => 'manipular medicamentos'])->assignRole('Medico');
        Permission::create(['name' => 'manipular medicos'])->assignRole('Administrador');
        Permission::create(['name' => 'manipular consultas'])->assignRole('Medico');
        Permission::create(['name' => 'ver reportes'])->assignRole('Administrador');
    }
}
