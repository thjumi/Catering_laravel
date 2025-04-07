<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Insumo;

class InsumoSeeder extends Seeder
{
    public function run()
    {
        Insumo::factory()->count(15)->create();
    }
}
