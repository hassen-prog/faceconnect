<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Don>
 */
class DonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => fake()->name(),
            'telephone' => fake()->phoneNumber(),
            'adresse' => fake()->address(),
            'montant' => fake()->randomFloat(2, 0, 1000),
            'code_postal' => fake()->postcode(),
            'nom_banque' => fake()->company(),
            'code_banque' => fake()->swiftBicNumber(),
        ];
    }
}
