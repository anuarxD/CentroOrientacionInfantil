<?php

namespace Database\Factories;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Psychologist;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalRecordFactory extends Factory
{
    protected $model = MedicalRecord::class;

    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'psychologist_id' => Psychologist::factory(), 
            'diagnostico' => $this->faker->sentence(10),
            'tratamiento' => $this->faker->paragraph(2),
            'notas' => $this->faker->optional()->paragraph(),
            'fecha_registro' => $this->faker->date(),
        ];
    }
}