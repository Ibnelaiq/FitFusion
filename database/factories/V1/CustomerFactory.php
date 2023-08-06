<?php

namespace Database\Factories\V1;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'gender' => fake()->randomElement(["F","M"]),
            'birth_date' => fake()->dateTime(),
            'name' => fake()->firstNameMale(),
            'surname' => fake()->lastName(),
            'passport_or_id' => str::random(10),
            'phone_number' => str::random(11)
        ];
    }
}
