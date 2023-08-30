<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Book;
use App\Models\Category;
use App\Models\Group;

class AcervoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $category = Category::factory()->create();
            Book::factory()
            ->count(10)
            ->for($category)
            ->create();
        }
    }
}
