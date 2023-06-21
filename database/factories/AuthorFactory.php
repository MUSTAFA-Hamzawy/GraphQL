<?php

namespace Database\Factories;

use App\Models\author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\author>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nationalities = [
            'Maldivian',
            'Cambodian',
            'Croatian',
            'Lithuanian',
            'Namibian',
            'Argentine',
            'Nepalese',
            'Qatari',
            'Nigerian',
            'Serbian'
        ];

        return [
            'author_name' => $this->faker->name(),
            'author_nationality' => $this->faker->randomElement($nationalities),
            'author_address' => $this->faker->address()
        ];
    }
}
