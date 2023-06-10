<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PersonalInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonalInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'district' => $this->faker->text(255),
            'gender' => $this->faker->text(255),
            'age' => $this->faker->randomNumber(0),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
