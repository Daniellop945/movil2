<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->randomElement(['Toyota', 'Ford', 'Chevrolet', 'Honda', 'BMW', 'Mercedes']),
            'model' => $this->faker->word(),
            'license_plate' => strtoupper($this->faker->unique()->bothify('??###??')),
            'year' => $this->faker->numberBetween(2000, 2024),
            'capacity' => $this->faker->numberBetween(2, 8),
            'fuel_type' => $this->faker->randomElement(['Gasoline', 'Diesel', 'Electric', 'Hybrid']),
            'daily_rate' => $this->faker->randomFloat(2, 20, 150), // Valores entre 20.00 y 150.00
            'is_available' => $this->faker->boolean(80), // 80% de probabilidades de que sea true
        ];
    }
}
