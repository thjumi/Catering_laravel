<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarea;

class TareaFactory extends Factory
{
    protected $model = Tarea::class;

    public function definition()
    {
        return [
            'nombre'      => $this->faker->sentence(2),
            'descripcion' => $this->faker->sentence,
            'fechaTarea'  => $this->faker->date,
            'estado'      => 'pendiente', // Valor predeterminado
            // 'empleado_id' se asignará en el seeder
        ];
    }
}
