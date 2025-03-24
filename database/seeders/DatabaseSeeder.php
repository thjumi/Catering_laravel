<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin12345'),
            'telefono' => '3112779085',
            'rol' => 'administrador',
        ]);

        User::create([
            'name' => 'Administrador Stock',
            'email' => 'stock@example.com',
            'password' => bcrypt('stock12345'),
            'telefono' => '3138790865',
            'rol' => 'administrador stock',
        ]);

       
        User::create([
            'name' => 'Chef',
            'email' => 'chef@example.com',
            'password' => bcrypt('empleado12345'),
            'telefono' => '3008795643',
            'rol' => 'empleado',
            'subrol' => 'Chef',
        ]);

        User::create([
            'name' => 'Mesero',
            'email' => 'mesero@example.com',
            'password' => bcrypt('empleado12345'),
            'telefono' => '3187098693',
            'rol' => 'empleado',
            'subrol' => 'Mesero',
        ]);
        
    }
}
