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
        return [
            'image' => 'users/' . $this->faker->image('public/storage/users',640,480,null,false),
            'name' => $this->faker->firstName,
            'first_last_name' => $this->faker->lastName,
            'second_last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'number' => $this->faker->phoneNumber,
            'status' => $this->faker->boolean,
            'password' => Hash::make('password'), 

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
