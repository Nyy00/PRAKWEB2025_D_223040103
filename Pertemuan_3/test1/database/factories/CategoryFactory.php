<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Pemrograman Web',
            'Framework PHP',
            'Frontend Development',
            'Backend Development',
            'Database',
            'UI/UX Design',
            'Tutorial Laravel',
            'Tips & Trik',
            'Best Practices',
            'Keamanan Web',
        ];

        return [
            'name' => fake()->unique()->randomElement($categories),
        ];
    }
}