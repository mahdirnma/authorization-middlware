<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'BMW',
            'description' => 'lorem ipsum',
            'category_id' => 1,
            'user_id' => 2,
        ]);
        Post::create([
            'title' => 'S25+',
            'description' => 'lorem ipsum2',
            'category_id' => 2,
            'user_id' => 3,
        ]);

    }
}
