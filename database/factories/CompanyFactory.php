<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

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
