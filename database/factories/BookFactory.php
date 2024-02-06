<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'book_token' => Str::random(30),
            'book_serial_number' => Str::random(5),
            'book_name' => $this->faker->title(),
            'book_author' => $this->faker->name(),
            'book_image_path' => $this->faker->imageUrl(),
            'book_quantity' => $this->faker->numberBetween(1, 10),
            'book_description' => $this->faker->paragraph(10),
            'faculty_id' => Faculty::factory(),
            'published_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
        ];
    }
}
