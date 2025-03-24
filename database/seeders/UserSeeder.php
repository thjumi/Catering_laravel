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
            'telefono' =>'3112779085',
            'rol' => 'administrador',
        ]);

        User::create([
            'name' => 'AdministradorStock',
            'email' => 'stock@example.com',
            'password' => bcrypt('stock12345'),
            'telefono' =>'3138790865',
            'rol' => 'administrador stock',
        ]);

        User::create([
            'name' => 'chef',
            'email' => 'chef@example.com',
            'password' => bcrypt('empleado12345'),
            'telefono' =>'3008795643',
            'rol' => 'empleado',
            'subrol' =>'Chef',
        ]);
        User::create([
            'name' => 'chef',
            'email' => 'chef@example.com',
            'password' => bcrypt('empleado12345'),
            'telefono' =>'3187098693',
            'rol' => 'empleado',
            'subrol' =>'mesero',
        ]);
       
    }
}

