<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Tuberculosis;
use Illuminate\Database\Eloquent\Factories\Factory;

class TuberculosisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tuberculosis::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'TB_symptoms' => $this->faker->text(255),
            'TB_positive' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
