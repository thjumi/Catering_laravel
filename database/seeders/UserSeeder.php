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
            'rol' => 'administrador',
        ]);

        User::create([
            'name' => 'AdministradorStock',
            'email' => 'stock@example.com',
            'password' => bcrypt('stock12345'),
            'rol' => 'administrador Stock',
        ]);

        User::create([
            'name' => 'chef',
            'email' => 'chef@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrol' =>'Chef',
        ]);
        User::create([
            'name' => 'Mesero',
            'email' => 'mesero@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrol' =>'mesero',
        ]);
       
    }
}

