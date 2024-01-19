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

use App\Models\Favorite;
use App\Models\Read;
use App\Models\Wish;
use App\Models\Reserve;


class AcervoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            Student::factory()->count(40)->for(Classroom::factory()->create())->create();
            $groups = Group::factory()->count(5)->create();
            $books = Book::factory()->count(6)->hasAttached($groups)->create();
            Category::factory()->hasAttached($books)->create();
        }

        Reserve::factory()->count(40)->create();
        Favorite::factory()->count(40)->create();
        Wish::factory()->count(40)->create();
        Read::factory()->count(40)->create();
    }
}
