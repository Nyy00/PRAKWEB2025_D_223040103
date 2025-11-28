<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Data nama dan username yang matching
        $users = [
            ['name' => 'Budi Santoso', 'username' => 'budisantoso'],
            ['name' => 'Siti Nurhaliza', 'username' => 'sitinurhaliza'],
            ['name' => 'Ahmad Fauzi', 'username' => 'ahmadfauzi'],
            ['name' => 'Dewi Lestari', 'username' => 'dewilestari'],
            ['name' => 'Rizky Pratama', 'username' => 'rizkypratama'],
            ['name' => 'Ayu Ting Ting', 'username' => 'ayutingting'],
            ['name' => 'Dimas Anggara', 'username' => 'dimasanggara'],
            ['name' => 'Maya Wijaya', 'username' => 'mayawijaya'],
            ['name' => 'Eko Prasetyo', 'username' => 'ekoprasetyo'],
            ['name' => 'Rina Susanti', 'username' => 'rinasusanti'],
        ];

        // Pilih user secara random
        $selectedUser = fake()->randomElement($users);
        
        // Tambahkan angka random untuk uniqueness
        $username = $selectedUser['username'] . fake()->numberBetween(1, 99);

        return [
            'name' => $selectedUser['name'],
            'username' => $username,
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
        ];
    }
}