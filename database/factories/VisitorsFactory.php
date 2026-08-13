<?php

namespace Database\Factories;

use App\Models\Visitors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Visitors>
 */
class VisitorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrival = fake()->dateTimeBetween('-1 month', 'now');
        return [
            'name' => fake()->name(),
            'contact_no' => fake()->randomNumber(9, true), 
            'address' => fake()->address(),
            'host' => fake()->name(),
            'arrival' => $arrival,
            'departure' => fake()->dateTimeBetween($arrival, $arrival->format('Y-m-d H:i:s') . ' +5 hours'),
        ];
    }
}
