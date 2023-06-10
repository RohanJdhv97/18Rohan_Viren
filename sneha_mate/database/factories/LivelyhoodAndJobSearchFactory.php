<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\LivelyhoodAndJobSearch;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivelyhoodAndJobSearchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LivelyhoodAndJobSearch::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'livelihood_training_program' => $this->faker->text(255),
            'sibling_job' => $this->faker->text(255),
            'travel_to_art_center_program' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
