<?php

namespace Database\Factories;

use App\Models\book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book>
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
            'book_title' => $this->faker->unique()->sentence(),
            'book_description' => $this->faker->text(),
            'author_id' => rand(1, 90)
        ];
    }
}
