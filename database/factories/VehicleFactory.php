<?php

namespace Database\Factories;

use App\Enums\VehicleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => fake()->word(),
            'user_id' => 1,
            'brand' => fake()->word(),
            'status' => VehicleStatus::ACTIVE,
            'year' => fake()->year(),
            'color' => fake()->colorName(),
            'price' => fake()->randomFloat(2, 10),
            'maintenance_last_6_months' => fake()->boolean(),
        ];
    }
}
