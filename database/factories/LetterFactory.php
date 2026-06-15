<?php

namespace Database\Factories;

use App\Models\Letter;
use App\Models\Company;
use App\Models\WorkPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Letter>
 */
class LetterFactory extends Factory
{
    protected $model = Letter::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'sender_id' => Company::factory(),
            'recipient_id' => Company::factory(),
            'work_package_id' => WorkPackage::factory(),
            'docref' => 'DOC-' . fake()->unique()->bothify('??????'),
            'subject' => fake()->sentence(),
            'contents' => fake()->paragraphs(asText: true),
            'docdate' => fake()->dateTime(),
            'confidential' => fake()->boolean(),
            'replyreq' => fake()->boolean(),
            'tag_count' => 0,
        ];
    }
}
