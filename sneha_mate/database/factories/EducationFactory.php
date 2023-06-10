<?php

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'current_qualification' => $this->faker->text(255),
            'orphan_status' => $this->faker->text(255),
            'future_education' => $this->faker->boolean(),
            'desired_field_of_study' => $this->faker->text(255),
            'dropout_status' => $this->faker->boolean(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
