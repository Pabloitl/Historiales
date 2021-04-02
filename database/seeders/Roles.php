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

        Permission::create(['name' => 'see index'])->assignRole('Administrador');
    }
}
