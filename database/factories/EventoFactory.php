<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Evento;

class EventoFactory extends Factory
{
    protected $model = Evento::class;

    public function definition()
    {
        return [
            'nombre'        => $this->faker->sentence(3),
            'descripcion'   => $this->faker->paragraph,
            'fecha'         => $this->faker->date,
            'horario'       => $this->faker->time('H:i'),
            'num_invitados' => $this->faker->numberBetween(50, 500),
            // 'administrador_id' se asignará en el seeder
        ];
    }
}
