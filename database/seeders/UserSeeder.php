<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Bivian Cruz',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin12345'),
            'role' => 'administrador',
        ]);

        User::create([
            'name' => 'Julieth Gómez',
            'email' => 'stock@example.com',
            'password' => bcrypt('stock12345'),
            'role' => 'administrador stock',
        ]);

        User::create([
            'name' => 'Sebastián Barragán',
            'email' => 'sebas@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'Chef',
        ]);
        User::create([
            'name' => 'Sleider Rodriguez',
            'email' => 'sleider@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'mesero',
        ]);

        User::create([
            'name' => 'Jasinta Romero',
            'email' => 'jas@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'Chef',
        ]);
        User::create([
            'name' => 'Rodrigo Sanchez',
            'email' => 'rodrif@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'mesero',
        ]);

        User::create([
            'name' => 'Laura Areas',
            'email' => 'Laura@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'Chef',
        ]);
        User::create([
            'name' => 'Brunno Ucampo',
            'email' => 'Brunno@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'mesero',
        ]);

        User::create([
            'name' => 'Angelica Santamaría',
            'email' => 'angel@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'Chef',
        ]);
        User::create([
            'name' => 'Oscar DLeon',
            'email' => 'oscar@example.com',
            'password' => bcrypt('empleado12345'),
            'role' => 'empleado',
            'subrole' =>'mesero',
        ]);

    }
}

