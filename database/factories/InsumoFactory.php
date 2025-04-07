<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Insumo;

class InsumoFactory extends Factory
{
    protected $model = Insumo::class;

    public function definition()
    {
        return [
            'nombre'         => $this->faker->word,
            'descripcion'    => $this->faker->sentence,
            'tipoInsumo'     => $this->faker->randomElement(['Tipo A', 'Tipo B', 'Tipo C']),
            'lugarAlmacen'   => $this->faker->city,
            'cantidad'       => $this->faker->numberBetween(1, 100),
            'stock'          => $this->faker->numberBetween(1, 100),
            'disponibilidad' => $this->faker->boolean,
        ];
    }
}
