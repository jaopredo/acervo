<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'register' => fake()->uuid(),
            'description' => fake()->sentence(),
            'cdd' => '1232123',
            'isbn' => '123123',
            'name' => fake()->name(),
            'author' => fake()->name(),
            'publication' => 1900,
            'editor' => fake()->name(),
            'pages' => 200,
            'volume' => 2,
            'example' => 3,
            'aquisition_year' => 2019,
            'aquisition' => "aaaaaaaa",
            'local' => 'bbbbbbbb',
            'image' => fake()->word() . '.' . fake()->fileExtension()
        ];
    }
}
