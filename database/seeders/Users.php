<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'medico',
            'email' => 'medico@test.com',
            'password' => bcrypt('password')
        ])->assignRole('Medico');

        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password')
        ])->assignRole('Administrador');
    }
}
