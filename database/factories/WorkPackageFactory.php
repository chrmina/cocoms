<?php

namespace Database\Factories;

use App\Models\WorkPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<WorkPackage>
 */
class WorkPackageFactory extends Factory
{
    protected $model = WorkPackage::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'number' => fake()->optional()->numerify('WP-####'),
            'name' => fake()->words(3, asText: true),
            'wp_coordinator' => fake()->optional()->name(),
            'wp_qs' => fake()->optional()->name(),
        ];
    }
}
