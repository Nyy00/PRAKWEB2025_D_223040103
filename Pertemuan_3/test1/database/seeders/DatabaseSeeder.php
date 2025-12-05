<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user default
        $user1 = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::factory()->create([
            'name' => 'Jane Smith',
            'username' => 'janesmith',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
        ]);

        // Buat 5 kategori
        $categories = Category::factory(5)->create();

        // Buat 20 posts dengan relasi ke user dan category yang sudah ada
        Post::factory(10)->create([
            'user_id' => $user1->id,
            'category_id' => $categories->random()->id,
        ]);

        Post::factory(10)->create([
            'user_id' => $user2->id,
            'category_id' => $categories->random()->id,
        ]);
    }
}
