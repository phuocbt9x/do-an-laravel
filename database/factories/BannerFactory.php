<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(),
            'content' => fake()->text(),
            'image' => fake()->imageUrl,
            'position' => fake()->randomElement([0, 1, 2]),
            'time_start' => Carbon::now()->addDays(rand(0, 10))->format('Y-m-d H:i:s'),
            'time_end' => Carbon::now()->addDays(rand(11, 20))->format('Y-m-d H:i:s'),
            'status' => fake()->boolean,
        ];
    }
}
