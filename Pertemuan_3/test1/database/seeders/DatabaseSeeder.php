<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 5 User
        $users = User::factory(5)->create();

        // Membuat 2 Category
        $categories = Category::factory(2)->create();

        // Membuat 10 Post dengan assign ke user dan category yang sudah ada
        Post::factory(10)
            ->state(function () use ($users, $categories) {
                return [
                    'user_id' => $users->random()->id,
                    'category_id' => $categories->random()->id,
                ];
            })
            ->create();
    }
}