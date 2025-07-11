<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Files>
 */
class FilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'file' => $this->faker->uuid() . '.pdf',  // solo nome file
            'comment' => $this->faker->text(),
            'is_public' => $this->faker->boolean(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
