<?php

namespace Database\Factories;

use App\Models\Enums\Weather\WeatherUnits;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSettings>
 */
class UserSettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lat' => fake()->latitude(),
            'lon' => fake()->longitude(),
            'locale' => fake()->randomElement(['en_US', 'pt_BR']),
            'unit' => fake()->randomElement(WeatherUnits::values()),
        ];
    }
}
