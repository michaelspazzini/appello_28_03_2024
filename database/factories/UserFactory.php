<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->firstName();
        $surname = $this->faker->lastName();
        $username = strtolower(substr($name, 0, 3) . substr($surname, 0, 3));
        return [
            'username' => $username,
            'name' => $name,
            'surname' => $surname,
            'password' => static::$password ??= Hash::make('password'),
            'role' => $this->faker->randomElement(['consumer', 'admin']),
            'remember_token' => Str::random(10),
        ];
    }

}
