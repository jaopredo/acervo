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
        // for ($i = 0; $i < 5; $i++) {
        //     $books = Book::factory()->count(6)->create();
        //     Category::factory()->hasAttached($books)->create();
        // }

        // Book::factory()->count(10)->for(Group::factory()->create())->create();
        Category::factory()->count(10)->create();
    }
}
