<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Administrador::create([
            'nit' => '987654321',
            'nombre_empresa' => 'CateringDash',
            'user_id' => 1,
        ]);

        Administrador::create([
            'nit' => '123456789',
            'nombre_empresa' => 'Cateringview',
            'user_id' => 2,
        ]);
    }
}

