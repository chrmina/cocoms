<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        $label = fake()->unique()->word();
        return [
            'id' => Str::uuid(),
            'namespace' => 'default',
            'slug' => Str::slug($label),
            'label' => $label,
            'tag_key' => Str::slug($label),
            'counter' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
