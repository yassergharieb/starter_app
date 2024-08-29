<?php

namespace Database\Factories\System;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" =>  $this->faker->name(),
            "email" =>  $this->faker->email(),
            "phone" =>  $this->faker->phoneNumber,
            "password" =>   Hash::make("123456789"),
            "is_active" => 1
        ];
    }
}
