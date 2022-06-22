<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portafolio>
 */
class PortafolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->sentence(4),
            'categoria' => $this->faker->word(),
            'imagen' => $this->faker->imageUrl(640, 480, 'animals', true),
            'url' => $this->faker->domainName()
        ];
    }
}
