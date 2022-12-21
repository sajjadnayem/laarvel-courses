<?php

namespace Database\Factories;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence,
            'type' =>fake()->randomDigit(0, 1),
            'resources' =>random_int(0, 1) ? random_int(1, 100) : 0.00,
            'year' => random_int(2010, 2021),
            'image' =>fake()->imageUrl(),
            'description' =>fake()->paragraph,
            'link' =>fake()->url(),
            'submitted_by' => User::all()->random()->id,
            'duration' => random_int(0, 2),
            'difficulty_level' => random_int(0, 2),
            'level' => random_int(0, 2),
            'platform_id' => Platform::all()->random()->id,

        ];
    }
}
