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
            'role' => 'administrador',
        ]);

        User::create([
            'name' => 'Administrador Stock',
            'email' => 'stock@example.com',
            'password' => bcrypt('stock12345'),
            'role' => 'administrador stock',
        ]);

       
        User::create([
            'name' => 'Chef',
            'email' => 'chef@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' => 'Chef',
        ]);

        User::create([
            'name' => 'Mesero',
            'email' => 'mesero@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' => 'Mesero',
        ]);
        
    }
}
