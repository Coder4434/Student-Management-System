<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NotGirisiModel>
 */
class NotGirisiModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ogrNo'=>fake()->numberBetween(1,50),
            'ders_kodu'=> fake()->countryCode(),
            'ders_adi'=> fake()->name(),
            'sinav_not'=>fake()->numberBetween(0,100),
            'donem'=>fake()->numberBetween(1,4)
        ];
    }
}
