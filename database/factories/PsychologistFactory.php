<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Psychologist;
use Illuminate\Database\Eloquent\Factories\Factory;

class PsychologistFactory extends Factory
{
    protected $model = Psychologist::class;

    public function definition()
    {
        return [
            'usuario_id' => User::factory(),
            'specialization' => $this->faker->word,
            'license_number' => $this->faker->unique()->numberBetween(1000, 9999),
            'contact_info' => $this->faker->phoneNumber,
        ];
    }
}

