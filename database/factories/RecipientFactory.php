<?php

namespace Database\Factories;

use App\Models\Recipient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Recipient>
 */
class RecipientFactory extends Factory
{
    protected $model = Recipient::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name' => fake()->name(),
            'address' => fake()->optional()->address(),
            'representative' => fake()->optional()->name(),
            'contact' => fake()->optional()->name(),
            'telephone' => fake()->optional()->phoneNumber(),
            'mobile' => fake()->optional()->phoneNumber(),
            'fax' => fake()->optional()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'remarks' => fake()->optional()->sentence(),
        ];
    }
}
