<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DersListesi>
 */
class DersListesiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'ders_kodu' => fake()->countryCode(),
                'ders_adi' => fake()->name(),
                'ders_kredisi' =>fake()->numberBetween(0,5),
                'ders_Ogretmen'=>fake()->lastName(),
                'ders_AKTS'=>fake()->numberBetween(1,5),
                'ders_Saati'=>fake()->numberBetween(1,5)

        ];
    }
}
