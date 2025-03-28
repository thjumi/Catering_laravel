<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin12345'),
            'role' => 'administrador',
        ]);

        User::create([
            'name' => 'AdministradorStock',
            'email' => 'stock@example.com',
            'password' => bcrypt('stock12345'),
            'role' => 'administrador stock',
        ]);

        User::create([
            'name' => 'chef',
            'email' => 'chef@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'Chef',
        ]);
        User::create([
            'name' => 'mesero',
            'email' => 'chef@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'mesero',
        ]);

    }
}

