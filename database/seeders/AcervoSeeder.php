<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Book;
use App\Models\Category;
use App\Models\Group;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Loan;

class AcervoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $groups = Group::factory()->count(5)->create();
            $books = Book::factory()->count(6)->hasAttached($groups)->create();
            Category::factory()->hasAttached($books)->create();
        }

        foreach (range(1, 9) as $i) {
            Student::factory()->count(40)->for(Classroom::factory()->create())->create();
        }
    }
}
